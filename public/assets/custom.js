// const getFileList = () => {
//     axios
//         .get("/fileList")
//         .then((response) => {
//             let jsonData = response.data;
//             $.each(jsonData, (i) => {
//                 console.log(jsonData[i].id);
//             });
//         })
//         .catch((err) => {});
// };
// getFileList();

// const onUploadFile = () => {
//     // let myBtnId = document.getElementById("uploaBtndId");
//     let myProgress = document.getElementById("uploadedPercentageID");
//     let myFile = document.getElementById("fileId").files[0];
//     let myFileName = myFile.name;
//     let myFileSize = myFile.size;
//     let myFileType = myFile.type;
//     let myFileLastUpDate = myFile.lastModified;
//     let myFileFormat = myFileName.split(".").pop();

//     // myBtnId.innerHTML =
//     //     '<div class="spinner-border text-warning shadow-sm" role="status"></div>';

//     console.log(myFileName);
//     console.log(myFileSize);
//     console.log(myFileType);
//     console.log(myFileLastUpDate);
//     console.log(myFileFormat);

//     let fileData = new FormData();
//     fileData.append("fileKey", myFile);
//     let config = {
//         headers: {
//             "content-type": "multipart/form-data",
//         },
//         onUploadProgress: (progressEvent) => {
//             // let uploadedPercentage = Math.round(
//             //     (progressEvent.loaded * 100) / progressEvent.total
//             // );
//             let uploadedMB = progressEvent.loaded / (1024 * 1024);
//             let totalMB = progressEvent.total / (1024 * 1024);
//             let dueMB = totalMB - uploadedMB;

//             $("#uploadedPercentageID").html(uploadedMB.toFixed(2) + " " + "MB");
//         },
//     };

//     let url = "/fileUp";

//     axios
//         .post(url, fileData, config)
//         .then((response) => {
//             if (response.status == 200) {
//                 $("#uploadedPercentageID").html("Success");
//                 setTimeout(() => {
//                     $("#uploadedPercentageID").html(" ");
//                 }, 1000);
//             } else {
//                 $("#uploadedPercentageID").html("Fail");
//                 setTimeout(() => {
//                     $("#uploadedPercentageID").html(" ");
//                 }, 1000);
//             }
//         })
//         .catch((error) => {
//             $("#uploadedPercentageID").html("Fail");
//             setTimeout(() => {
//                 $("#uploadedPercentageID").html(" ");
//             }, 1000);
//         });
// };
