l<!DOCTYPE html>

<html>
    <head>
        <style type="text/css">
            .bodyBody {
                margin: 10px;
                font-size: 1.50em;
            }
            .divHeader {
                text-align: right;
                border: 1px solid;
            }
            .divReturnAddress {
                text-align: left;
                float: right;
            }
            .divSubject {
                clear: both;
                font-weight: bold;
                padding-top: 80px;
            }
            .divAdios {
                float: right;
                padding-top: 50px;
            }
        </style>
    </head>
   
        <div class="divSubject">
          <p>
             {{ $lname }}</p>
        </div>

        <div class="divContents">
            <p>
             {{ $email }}</p>
        </div>

        <p>{{ $fname }}</p>
           
        </div>
    </body>
</html>
                