<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user_input;
use App\Models\submission_log;
use Illuminate\Support\Facades\DB;

class dataController extends Controller
{
    function saveInput(Request $request)
    {
        DB::beginTransaction();
        try
        {
            $fileName = null;
            $request->validate([
                'textBox' => 'required|string|max:100',
                'radioButton' => 'required',
                'checkBox' => 'required|array',
                'imgFile' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);

            if($request->hasFile('imgFile'))
            {
                $timeStamp = now()->format('Ymd_His');
                $extension = $request->file('imgFile')->getClientOriginalExtension();
                $fileName = $timeStamp . '.' . $extension;

                //$filePath = $request->file('imgFile')->storeAs('uploads', $fileName, 'public');
                $filePath = $request->file('imgFile')->move(public_path('uploads'), $fileName);
            }

            $input = new user_input();

            $input->textBox = $request->textBox;
            $input->checkBox = json_encode($request->checkBox);
            $input->radioBox = $request->radioButton;
            $input->imageLocation = $fileName;
            $input->save();
            

            if (!$input->save())
            {
                throw new \Exception('There is an error saving the data');
            }

            $lastId = $input->input_id;

            $logs = new submission_log();

            $logs->input_id = $lastId;

            if (!$logs->save())
            {
                throw new \Exception('There is an error saving the data');
            }

            DB::commit();

            return response()->json(['success' => true, 'message' => 'Data Saved Successfully!']);
            }
        catch (\Exception $e)
        {
            DB::rollBack();
            return response()->json(['success' => false, 'message' => 'Failed to save data: ' . $e->getMessage()]);
        }
    }

    function getLogs()
    {
        // Retrieve all submission logs (you can customize this query)
        $logs = submission_log::all();

        // Return the logs as a JSON response
        return response()->json([
            'success' => true,
            'data' => $logs
        ]);
    }

    function getInfo(Request $request)
    {
        $request->validate([
            'inputId'=> 'required',
        ]);

        $input_id = $request->input('inputId');

        $logInfo = user_input::where('input_id', $input_id)->first();
        

        if (!$logInfo)
        {
            return response()->json(['success' => false, 'message' => 'Information cannot be found']);
        }
        return response()->json(['success' => true, 'data' => $logInfo]);
    }

    function updateLog($inputId, Request $request)
    {
        DB::beginTransaction();
        try {
            // Find the record by input ID
            $record = user_input::find($inputId);

            $request->validate([
                'updateTextbox' => 'required|string|max:100',
                'updateRadio' => 'required',
                'updateCheckbox' => 'required|array',
            ]);
    
            if (!$record) {
                throw new \Exception('Record cannot be found');
            }
    
            $record->textBox = $request->input('updateTextbox');
            $record->radioBox = $request->input('updateRadio');
            $record->checkBox = json_encode($request->input('updateCheckbox'));
    
            if ($request->hasFile('updateImgFile')) {
                $timeStamp = now()->format('Ymd_His');
                $extension = $request->file('updateImgFile')->getClientOriginalExtension();
                $fileName = $timeStamp . '.' . $extension;
    
                $filePath = $request->file('updateImgFile')->storeAs('uploads', $fileName, 'public');
    
                $record->imageLocation = $fileName;
            }
    
            $recordSaved = $record->save();
    
            if (!$recordSaved) {
                throw new \Exception('Failed to save updated input.');
            }
    
            DB::commit();
    
            return response()->json(['success' => true, 'message' => "Record updated successfully"], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'message' => 'Encountered an error: ' . $e->getMessage()]);
        }
    }
    
    function deleteLog($inputId)
    {
        try
        {
            DB::beginTransaction();

            $log = user_input::find($inputId);

            if(!$log)
            {
                throw new Exception('Record is cannot  be found!!!');
            }

            if($log->delete())
            {
                DB::commit();
                return response()->json(['success' => true, 'message' => 'Record successfully deleted: '], 200);    
            }
            else
            {
                throw new Exception('Record cannot be deleted!!!');
            }
        }
        catch (\Exception $e)
        {
            DB::rollBack();
            return response()->json(['success' => false, 'message' => 'Encountered an error: ' . $e->getMessage()]);
        }
    }
}
