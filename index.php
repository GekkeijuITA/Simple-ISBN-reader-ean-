<!DOCTYPE html>
<html>
    <head>
        <title>Camera viewer</title>
        <script src="js/quagga.min.js"></script>    
    </head>
    <body>
        <div id="yourElement"></div>
        <div id="result"></div>
    </body>
    <script>
        //Webcam start
        Quagga.init({
            inputStream : {
            type : "LiveStream",
            target: document.querySelector('#yourElement'),
            },
            decoder : {
                readers:["ean_reader"]
            }
        }, function(err) {
            if (err) {
                console.log(err);
                return
            }
            console.log("Initialization finished. Ready to start");
            Quagga.start();           
        }); 
        //Detect Barcode
        Quagga.onDetected(
                function(data)
                {
                    if(data.codeResult)
                    {
                        var last_code = data.codeResult.code;
                        document.getElementById("result").textContent = last_code;
                        console.log(last_code);
                    }
                    else
                    {
                        console.log("Not detected");
                    }
                }
        );            
    </script>
</html>