
<!-- Include the AWS SDK for JavaScript -->
<script src="https://sdk.amazonaws.com/js/aws-sdk-2.805.0.min.js"></script>

<!-- Add a file input field to your HTML form -->
<input type="file" id="fileInput" accept=".glb,.gltf">

<!-- Add a button to trigger the upload -->
<button onclick="uploadFile()">Upload</button>

<!-- Add a progress bar to display the upload progress -->
<progress id="progressBar" value="0" max="100"></progress>

<script>
  // Initialize the AWS SDK
  // Initialize the Amazon Cognito credentials provider
    // Initialize the Amazon Cognito credentials provider
    AWS.config.region = 'ap-south-1'; // Region
    AWS.config.credentials = new AWS.CognitoIdentityCredentials({
        IdentityPoolId: 'ap-south-1:ed09cd7f-4f36-4214-be8a-0d5d2acef12b',
    });

  // Get a reference to your S3 bucket
  var bucket = new AWS.S3({
    params: { Bucket: 'furnterior' } // Change this to your S3 bucket name
  });

  // Function to upload the selected file to S3
  function uploadFile() {
    var file = document.getElementById('fileInput').files[0];
    if (!file) {
      alert('Please select a file to upload.');
      return;
    }

    var key = 's3://furnterior/3D Models/'; // S3 key where you want to store the file

    var params = {
      Key: key,
      ContentType: file.type,
      Body: file,
      ACL: 'public-read', // allows anyone to read the object, but only the object owner to write or delete it.
      //GrantFullControl: 'arn:aws:iam::017108010300:user/Furnterior_User'
    };

    var progressBar = document.getElementById('progressBar');

    bucket.upload(params, function(err, data) {
      if (err) {
        console.log('Error uploading file:', err);
        alert('Error uploading file: ' + err.message);
      } else {
        console.log('File uploaded successfully:', data.Location);
        alert('File uploaded successfully to ' + data.Location);
      }
    }).on('httpUploadProgress', function(progress) {
      var percent = parseInt((progress.loaded * 100) / progress.total);
      console.log('Upload progress:', percent + '%');
      progressBar.value = percent;
    });
  }
</script>
