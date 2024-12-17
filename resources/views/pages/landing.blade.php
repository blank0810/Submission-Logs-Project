@extends('general_layouts.body')
@section('title', 'PHP Assessment Form')
@section('pageSpecificStyle')
@stop

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h2><i class="fas fas fa-file-alt mr-2"></i>Form Assessment</h2>
          </div>
        </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-5">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">PHP Assessment Form</h3>
              </div>
              <form action="/input" method="post" id="input-form" class="needs-validation" enctype="multipart/form-data"
                novalidate>
                <div class="card-body">
                  <div class="form-group">
                    <label for="textBodx">Text box <span class="text-muted small" style="font-style: italic;">
                        <strong>(100
                          Characters)</strong></span></label>
                    <input type="text" class="form-control" id="textBox" name="textBox" placeholder="Hello World"
                      required>
                  </div>
                  <div class="form-group">
                    <label class="">Radio button</label>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="radioButton" value="Hi" required>
                      <label class="form-check-label">Hi</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="radioButton" value="Hello">
                      <label class="form-check-label">Hello</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="">Checkbox</label>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="checkBox[]" value="World!" required>
                      <label class="form-check-label">World!</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="checkBox[]" value="Web!">
                      <label class="form-check-label">Web!</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" accept="image/*" class="custom-file-input" id="imgFile" name="imgFile">
                        <label class="custom-file-label" for="exampleInputFile">Select image</label>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="button" id="submitBtn" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
          </div>
          <div class="col">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Submission Logs</h3>
              </div>

              <div class="card-body">
                <table class="table table-bordered" id="logsTable">
                  <thead>
                    <tr>
                      <td>Submission ID</td>
                      <td>Submission Date & Time</td>
                      <td>Actions</td>
                    </tr>
                  </thead>
                  <tbody id="submissionList">

                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="info-modal">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">User Input information</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div id="info-card" class="card card-primary card-outline">
                <div class="card-header">
                  <h3 class="card-title card-tools text-muted" id="input-id-text"><strong>Input ID:</strong> <span
                      class="small" id="input_id">{Sample
                      input
                      ID}</span></h3>
                </div>
                <div class="card-body">
                  <div class="form-group">
                    <label class="mr-2"><strong>Textbox Input: </strong></label><span id="text-input">Sample
                      Text</span>
                  </div>
                  <div class="form-group">
                    <label class="mr-2"><strong>Radio Button & Checkbox Input: </strong></label><span
                      class="checkBox-radioBox" id="radio-check-input">Hello
                      World</span>
                  </div>
                  <div class="form-group">
                    <label class="mr-2"><strong>Image: </strong></label>
                    <img src="https://placehold.it/150x100" alt="..." style="width: 150px; height: 100px"
                      id="img-input">
                  </div>
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">3rd Party API Response <span class="text-danger small">(Note: Since the
                          provided
                          API is not working, I use another 3rd party API called Random User)</span></h3>
                    </div>
                    <div class="card-body">
                      <table class="table table-bordered" id="api-table">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Email</th>
                          </tr>
                        </thead>
                        <tbody id="api-response">
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <form action="/update" method="post" id="update-form" class="needs-validation" style="display: none"
                enctype="multipart/form-data" novalidate style="display: none">
                <div class="card-body">
                  <div class="form-group">
                    <input type="text" id="update-input_id" style="display: none;">
                  </div>
                  <div class="form-group">
                    <label for="textBodx">Text box <span class="text-muted small" style="font-style: italic;">
                        <strong>(100
                          Characters)</strong></span></label>
                    <input type="text" class="form-control" id="updateTextbox" name="updateTextbox"
                      placeholder="Hello World" required>
                  </div>
                  <div class="form-group">
                    <label class="">Radio button</label>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="updateRadio" value="Hi" required>
                      <label class="form-check-label">Hi</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="updateRadio" value="Hello">
                      <label class="form-check-label">Hello</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="">Checkbox</label>
                    <div class="form-check">
                      <input class="form-check-input checkbox" type="checkbox" name="updateCheckBox[]" value="World!"
                        required>
                      <label class="form-check-label">World!</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input checkbox" type="checkbox" name="updateCheckBox[]" value="Web!">
                      <label class="form-check-label">Web!</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" accept="image/*" class="custom-file-input" id="updateImgFile"
                          name="imgFile">
                        <label class="custom-file-label" for="exampleInputFile">Select new image</label>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" id="closeBtn" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" style="display: none" id="cancelBtn" class="btn btn-danger">Discard</button>
              <button id="editBtn" type="button" class="btn btn-success"><i
                  class="fas fa-pencil-alt mr-2"></i>Edit</button>
              <button type="button" id="saveBtn" class="btn btn-primary" style="display: none">Save
                changes</button>
            </div>
          </div>
        </div>
      </div>
      <!-- /.modal-dialog -->
    </section>
    <!-- /.content -->
  </div>
@endsection
@section('pagespecificscript')
  <!-- bs-custom-file-input -->
  <script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
  <script>
    $(function() {
      bsCustomFileInput.init();
    });

    $('#logsTable').DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
    });

    // Ajax when adding a new submission of data
    $(document).ready(function() {
      $('#submitBtn').on('click', function(e) {
        e.preventDefault();

        Swal.fire({
          icon: 'question',
          title: 'Confirm submission',
          text: 'Do you wish to submit this information?',
          showCancelButton: true,
          confirmButtonText: '<i class="far fa-check-circle"></i> Yes',
          cancelButtonText: '<i class="far fa-times-circle"></i> Cancel',
          confirmButtonColor: '#28a745', // Green color for the Yes button
          cancelButtonColor: '#dc3545', // Red color for the No button
          reverseButtons: true
        }).then((result) => {
          if (result.isConfirmed) {
            var formData = new FormData();

            // I only the target the fields in related to the user input
            formData.append('textBox', $('#textBox').val());
            formData.append('radioButton', $('input[name="radioButton"]:checked').val());

            var checkboxValues = $('input[name="checkBox[]"]:checked').map(function() {
              return $(this).val();
            }).get();

            formData.append('checkBox[]', checkboxValues);

            formData.append('imgFile', $('#imgFile')[0].files[0]);

            // Log FormData entries for debugging
            for (var pair of formData.entries()) {
              console.log(pair[0] + ': ' + pair[1]);
            }

            $.ajax({
              url: "/input",
              type: "POST",
              data: formData,
              dataType: 'json',
              processData: false,
              contentType: false,
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              success: function(response) {
                if (response.success) {
                  Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: response.message,
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 1500,
                    timerProgressBar: true
                  }).then((result) => {
                    sessionStorage.removeItem('submissionLogs');
                    getLogs();
                  });
                } else {
                  Swal.fire({
                    icon: 'warning',
                    title: 'Error Encountered: ',
                    text: ' ' + response.message,
                    showConfirmButton: true,
                  });
                }
              },
              error: function(xhr) {
                console.log('An error occurred: ' + xhr.responseText);
                Swal.fire({
                  icon: 'error',
                  title: 'Error',
                  text: 'An error occurred: Check the console log!!!',
                });
              }
            });
          }
        });
      });
    });

    // This is the function responsible for parsing the logs either to get from the cache or retrieve new list from the server
    $(document).ready(function() {
      let logs = JSON.parse(sessionStorage.getItem('submissionLogs'));
      if (!logs) {
        getLogs();
      } else {
        parseLogs(logs);
      }
    });

    // Function responsible for retrieving the logs and saving it to the cache
    function getLogs() {
      $.ajax({
        url: '/get-submission-logs',
        type: 'GET',
        dataType: 'json',
        success: function(response) {
          if (response.success) {
            sessionStorage.setItem('submissionLogs', JSON.stringify(response.data));
            parseLogs(response.data);
            Swal.fire({
              icon: 'success',
              title: 'Success',
              text: 'Submission logs loaded successfully!',
              toast: true,
              position: 'top-end',
              showConfirmButton: false,
              timer: 1500,
              timerProgressBar: true
            });
          }
        },
        error: function(xhr) {
          console.log('Error fetching submission logs: ' + xhr.responseText);
          Swal.fire({
            icon: 'error',
            title: 'Data Error',
            text: 'There is something wrong, please check the console!!',
            toast: true,
            showConfirmButton: false,
            position: 'top-end',
            timer: 1500,
            timerProgressBar: true
          });
        }
      });
    }

    // Function for parsing the logs dynamically to the table
    function parseLogs(logs) {
      var logsTable = $('#submissionList');
      logsTable.empty();

      $.each(logs, function(index, log) {
        var row = $('<tr>');

        var date = new Date(log.created_at);
        var formattedDate = date.toLocaleString();

        var submissionIdCell = $('<td>').text(log.log_id);
        submissionIdCell.attr('data-input-id', log
          .input_id);
        row.append(submissionIdCell);

        var submissionDate = $('<td>').text(formattedDate);
        row.append(submissionDate);

        var actions = $('<td>');
        actions.append(
          '<button class="btn btn-primary btn-sm mr-2 view-btn"> <i class="fas fa-eye mr-2"></i>View</button>'
        );
        actions.append(
          '<button class="btn btn-danger btn-sm mr-2 delete-btn"> <i class="fas fa-trash-alt mr-2"></i>Delete</button>'
        );
        row.append(actions);

        logsTable.append(row);
      });
    }

    $(document).on('click', '.delete-btn', function(event) {
      var row = $(this).closest('tr');
      var idCell = row.find('td[data-input-id]');
      var inputId = idCell.data('input-id');
      console.log(inputId);
      swal.fire({
        icon: 'question',
        title: 'Do you wish to delete this log?',
        html: '<span style="color: red;">Note: After deletion, the log cannot be recovered</span>',
        showCancelButton: true,
        confirmButtonText: '<i class="far fa-check-circle"></i> Yes',
        cancelButtonText: '<i class="far fa-times-circle"></i> Cancel',
        confirmButtonColor: '#28a745', // Green color for the Yes button
        cancelButtonColor: '#dc3545', // Red color for the No button
        reverseButtons: true,
      }).then((results) => {
        if (results.isConfirmed) {
          deleteLog(inputId);
        }
      })
    })

    function deleteLog(inputId) {
      $.ajax({
        url: `/delete-log/${inputId}`,
        type: 'delete',
        processData: false,
        contentType: false,
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success(response) {
          if (response.success) {
            swal.fire({
              icon: 'success',
              title: 'Successfully Deleted',
              text: response.message,
              toast: true,
              position: 'top-end',
              timer: 1500,
              timerProgressBar: true,
              showConfirmButton: false,
            }).then((result) => {
              sessionStorage.removeItem('submissionLogs');
              getLogs();
            })
          } else {
            swal.fire({
              icon: 'question',
              title: 'Unknown error',
              text: response.message,
              toast: true,
              position: 'top-end',
              timer: 1500,
              timerProgressBar: true,
              showConfirmButton: false,
            })
          }
        },
        error: function(xhr, status, error) {
          console.log(xhr.responseText);
          Swal.fire({
            icon: 'error',
            title: 'Update Error',
            text: 'Please see console',
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 1500,
            timerProgressBar: true
          })
        }
      });
    }
  </script>

  <script>
    // On this part I used the vanilla js fetch due to multiple parsing of data
    $(document).on('click', '.view-btn', function(event) {
      var row = $(this).closest('tr');
      var idCell = row.find('td[data-input-id]');
      var inputId = idCell.data('input-id');
      console.log(inputId);
      fetchData(inputId);
      var infoModal = new bootstrap.Modal(document.getElementById('info-modal'));
      infoModal.show();

      async function fetchData(inputId) {
        try {
          const userResponse = await fetch('https://randomuser.me/api/?inc=name,gender,email&noinfo');
          const userData = await userResponse.json();
          const logResponse = await fetch(`/get-log-info?inputId=${inputId}`);
          const logData = await logResponse.json();

          parseData(userData.results, logData.data);
        } catch (error) {
          console.log('Error fetching data: ', error);
          Swal.fire({
            icon: 'error',
            title: 'API Response Error',
            text: 'Error while fetching data.',
            toast: true,
            showConfirmButton: false,
            position: 'top-end',
            timer: 1500,
            timerProgressBar: true
          });
        }
      }

      function parseData(userDetails, logDetails) {
        var apiTable = $('#api-response');
        apiTable.empty();
        var textBoxInput = logDetails.textBox;

        var checkBoxArray = JSON.parse(logDetails.checkBox);
        var radioCheckBox = logDetails.radioBox + " " + checkBoxArray.join(" ");
        var inputId = logDetails.input_id;

        var imageFileName = logDetails.imageLocation;

        document.getElementById('input_id').textContent = inputId;
        document.getElementById('text-input').textContent = textBoxInput;
        document.getElementById('radio-check-input').textContent = radioCheckBox;
        $('#img-input').attr('src', "/uploads/" + imageFileName);

        $('#update-input_id').val(inputId);
        $('#updateTextbox').val(textBoxInput);
        $(`input[name="updateRadio"][value="${logDetails.radioBox}"]`).prop('checked', true);
        $('#update-form .checkbox').each(function() {
          const checkbox = $(this);
          const label = checkbox.next('label').text().trim(); // Get the label text and trim whitespace

          // Check the checkbox if the label text is in the array
          if (logDetails.checkBox.includes(label)) {
            checkbox.prop('checked', true);
          }
        });

        $.each(userDetails, function(index, details) {
          var row = $('<tr>');
          var name = details.name.title + '  ' + details.name.first + ' ' + details.name.last;

          var nameRow = $('<td>').text(name);
          row.append(nameRow);

          var genderRow = $('<td>').text(details.gender);
          row.append(genderRow);

          var emailRow = $('<td>').text(details.email);
          row.append(emailRow);

          apiTable.append(row);
        })
      }
    })

    $(document).ready(function() {
      $('#editBtn').on('click', function(e) {
        $('#editBtn').toggle();
        $('#cancelBtn').toggle();
        $('#saveBtn').toggle();
        $('#closeBtn').toggle();
        $('#info-card').toggle();
        $('#update-form').fadeToggle();
      })

      $('#cancelBtn').on('click', function(e) {
        $('#editBtn').toggle();
        $('#cancelBtn').toggle();
        $('#saveBtn').toggle();
        $('#closeBtn').toggle();
        $('#info-card').fadeToggle();
        $('#update-form').toggle();
      })

      $('#saveBtn').on('click', function(e) {

        Swal.fire({
          icon: 'question',
          title: 'Confirm submission',
          text: 'Do you wish to update this information?',
          showCancelButton: true,
          confirmButtonText: '<i class="far fa-check-circle"></i> Yes',
          cancelButtonText: '<i class="far fa-times-circle"></i> Cancel',
          confirmButtonColor: '#28a745', // Green color for the Yes button
          cancelButtonColor: '#dc3545', // Red color for the No button
          reverseButtons: true
        }).then((result) => {
          if (result.isConfirmed) {
            updateLog();
          }
        })
      })

      function updateLog() {
        var formData = new FormData();
        var inputId = $('#update-input_id').val();
        console.log('URL:', `/update-log/${inputId}`);
        formData.append('updateTextbox', $('#updateTextbox').val());
        formData.append('updateRadio', $('input[name="updateRadio"]:checked').val());
        console.log($('#updateTextbox').val());

        var checkboxValues = $('input[name="updateCheckBox[]"]:checked').map(function() {
          return $(this).val();
        }).get();

        formData.append('updateCheckbox[]', checkboxValues);

        formData.append('updateImgFile', $('#updateImgFile')[0].files[0])

        formData.forEach(function(value, key) {
          console.log(key, value);
        });

        $.ajax({
          url: `/update-log/${inputId}`,
          type: 'post',
          data: formData,
          dataType: 'json',
          processData: false,
          contentType: false,
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          success(response) {
            if (response.success) {
              Swal.fire({
                icon: 'success',
                title: 'Update Successfully',
                text: response.message,
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 1500,
                timerProgressBar: true
              }).then((result) => {
                window.location.href = "/";
              })
            } else {
              Swal.fire({
                icon: 'question',
                title: 'Unknown error occured',
                text: response.message,
                showConfirmButton: true,
              })
            }
          },
          error: function(xhr, status, error) {
            console.log(xhr.responseText);
            Swal.fire({
              icon: 'error',
              title: 'Update Error',
              text: 'Please see console',
              toast: true,
              position: 'top-end',
              showConfirmButton: false,
              timer: 1500,
              timerProgressBar: true
            })
          }
        })
      }
    })
  </script>
@stop
