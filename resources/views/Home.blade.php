@extends('Layout.app')

@section('content')
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6 mt-5">
                <div class="card text-center mx-3">
                    <div class="card-header">
                        <h6>Laravel Ajax File Upload</h6>
                    </div>
                    <div class="card-body p-4">
                        <input id="fileId" class="form-control my-3" type="file">
                        <button type="button" onclick="onUploadFile()" id="uploaBtndId"
                            class="btn w-100 my-3 btn-primary">Upload</button>
                        <h6 id="uploadedPercentageID"></h6>

                    </div>
                </div>
            </div>

            <div class="col-md-4 card tect-center p-3 mt-5">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Download</th>
                        </tr>
                    </thead>
                    <tbody class="tableData">

                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <div class="col-md-4 text-center pt-5">
        <img src="{{ asset('storage/EDvJvrGl8Fks6lyfjHriHgKEKdPYYQgjt5BkiHQX.jpg') }}" alt="" class="w-50 img-thumbnail">
    </div>
    <script type="text/javascript">
        const getFileList = () => {
            axios.get('/fileList')
                .then((response) => {
                    let jsonData = response.data;
                    $.each(jsonData, (i) => {
                        $('<tr>').html("<td>" + jsonData[i].id + "</td>" +
                            "<td><a href='/download/" + jsonData[i].file_path +
                            "' class='btn downloadBtn text-white btn-success'>Download</a></td>"
                        ).appendTo('.tableData');
                    });
                    // $('.downloadBtn').click(function() {
                    //     var file_path = $(this).data('path');
                    //     alert(file_path);
                    // })

                })
                .catch((err) => {
                    console.log(err);
                });
        };
        getFileList();




        const onUploadFile = () => {
            // let myBtnId = document.getElementById("uploaBtndId");
            let myProgress = document.getElementById("uploadedPercentageID");
            let myFile = document.getElementById("fileId").files[0];
            let myFileName = myFile.name;
            let myFileSize = myFile.size;
            let myFileType = myFile.type;
            let myFileLastUpDate = myFile.lastModified;
            let myFileFormat = myFileName.split(".").pop();

            // myBtnId.innerHTML =
            //     '<div class="spinner-border text-warning shadow-sm" role="status"></div>';

            console.log(myFileName);
            console.log(myFileSize);
            console.log(myFileType);
            console.log(myFileLastUpDate);
            console.log(myFileFormat);

            let fileData = new FormData();
            fileData.append("fileKey", myFile);
            let config = {
                headers: {
                    "content-type": "multipart/form-data"
                },
                onUploadProgress: (progressEvent) => {
                    // let uploadedPercentage = Math.round(
                    //     (progressEvent.loaded * 100) / progressEvent.total
                    // );
                    let uploadedMB = progressEvent.loaded / (1024 * 1024);
                    let totalMB = progressEvent.total / (1024 * 1024);
                    let dueMB = totalMB - uploadedMB;

                    $("#uploadedPercentageID").html(uploadedMB.toFixed(2) + " " + "MB");
                },
            };

            let url = "/fileUp";

            axios
                .post(url, fileData, config)
                .then((response) => {
                    if (response.status == 200) {
                        $("#uploadedPercentageID").html("Success");
                        setTimeout(() => {
                            $("#uploadedPercentageID").html(" ");
                        }, 1000);
                    } else {
                        $("#uploadedPercentageID").html("Fail");
                        setTimeout(() => {
                            $("#uploadedPercentageID").html(" ");
                        }, 1000);
                    }
                })
                .catch((error) => {
                    $("#uploadedPercentageID").html("Fail");
                    setTimeout(() => {
                        $("#uploadedPercentageID").html(" ");
                    }, 1000);
                });
        };
    </script>
@endsection

<script type="text/javascript" src="{{ asset('assets/custom.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/jquery.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
