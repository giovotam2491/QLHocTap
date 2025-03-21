<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome-animation/0.2.1/font-awesome-animation.min.css">
    
    
    
  <style>
        body
        {
        background: #000e29;
        }

        .alert>.start-icon {
            margin-right: 0;
            min-width: 20px;
            text-align: center;
        }

        .alert>.start-icon {
            margin-right: 5px;
        }

        .greencross
        {
        font-size:18px;
            color: #25ff0b;
            text-shadow: none;
        }

        .alert-simple.alert-success
        {
        border: 1px solid rgba(36, 241, 6, 0.46);
            background-color: rgba(7, 149, 66, 0.12156862745098039);
            box-shadow: 0px 0px 2px #259c08;
            color: #0ad406;
        text-shadow: 2px 1px #00040a;
        transition:0.5s;
        cursor:pointer;
        }
        .alert-success:hover{
        background-color: rgba(7, 149, 66, 0.35);
        transition:0.5s;
        }
        .alert-simple.alert-info
        {
        border: 1px solid rgba(6, 44, 241, 0.46);
            background-color: rgba(7, 73, 149, 0.12156862745098039);
            box-shadow: 0px 0px 2px #0396ff;
            color: #0396ff;
        text-shadow: 2px 1px #00040a;
        transition:0.5s;
        cursor:pointer;
        }

        .alert-info:hover
        {
        background-color: rgba(7, 73, 149, 0.35);
        transition:0.5s;
        }

        .blue-cross
        {
        font-size: 18px;
            color: #0bd2ff;
            text-shadow: none;
        }

        .alert-simple.alert-warning
        {
            border: 1px solid rgba(241, 142, 6, 0.81);
            background-color: rgba(220, 128, 1, 0.16);
            box-shadow: 0px 0px 2px #ffb103;
            color: #ffb103;
            text-shadow: 2px 1px #00040a;
        transition:0.5s;
        cursor:pointer;
        }

        .alert-warning:hover{
        background-color: rgba(220, 128, 1, 0.33);
        transition:0.5s;
        }

        .warning
        {
            font-size: 18px;
            color: #ffb40b;
            text-shadow: none;
        }

        .alert-simple.alert-danger
        {
        border: 1px solid rgba(241, 6, 6, 0.81);
            background-color: rgba(220, 17, 1, 0.16);
            box-shadow: 0px 0px 2px #ff0303;
            color: #ff0303;
            text-shadow: 2px 1px #00040a;
        transition:0.5s;
        cursor:pointer;
        }

        .alert-danger:hover
        {
            background-color: rgba(220, 17, 1, 0.33);
        transition:0.5s;
        }

        .danger
        {
            font-size: 18px;
            color: #ff0303;
            text-shadow: none;
        }

        .alert-simple.alert-primary
        {
        border: 1px solid rgba(6, 241, 226, 0.81);
            background-color: rgba(1, 204, 220, 0.16);
            box-shadow: 0px 0px 2px #03fff5;
            color: #03d0ff;
            text-shadow: 2px 1px #00040a;
        transition:0.5s;
        cursor:pointer;
        }

        .alert-primary:hover{
        background-color: rgba(1, 204, 220, 0.33);
        transition:0.5s;
        }

        .alertprimary
        {
            font-size: 18px;
            color: #03d0ff;
            text-shadow: none;
        }

        .square_box {
            position: absolute;
            -webkit-transform: rotate(45deg);
            -ms-transform: rotate(45deg);
            transform: rotate(45deg);
            border-top-left-radius: 45px;
        
        </style>
</head>
    <body>
        <section>
            <div class="square_box box_three"></div>
            <div class="square_box box_four"></div>
            <div class="container mt-5">
                <div class="row">
                    
                    <div class="col-sm-12">
                        <div class="alert fade alert-simple alert-success alert-dismissible text-left font__family-montserrat font__size-16 font__weight-light brk-library-rendered rendered show">
                            <button type="button" class="close font__size-18" data-dismiss="alert">
                                <span aria-hidden="true"><a>
                                    <i class="fa fa-times greencross"></i>
                                </a></span>
                    <span class="sr-only">Close</span> 
                    </button>
                    <i class="start-icon far fa-check-circle faa-tada animated"></i>
                    <strong class="font__weight-semibold">Well done!</strong> You successfullyread this important.
                </div>
            </div>

            <div class="col-sm-12">
                <div class="alert fade alert-simple alert-info alert-dismissible text-left font__family-montserrat font__size-16 font__weight-light brk-library-rendered rendered show" role="alert" data-brk-library="component__alert">
                    <button type="button" class="close font__size-18" data-dismiss="alert">
                        <span aria-hidden="true">
                        <i class="fa fa-times blue-cross"></i>
                    </span>
                    <span class="sr-only">Close</span>
                    </button>
            <i class="start-icon  fa fa-info-circle faa-shake animated"></i>
            <strong class="font__weight-semibold">Heads up!</strong> This alert needs your attention, but it's not super important.
            </div>
            
        </div>
        
        <div class="col-sm-12">
            <div class="alert fade alert-simple alert-warning alert-dismissible text-left font__family-montserrat font__size-16 font__weight-light brk-library-rendered rendered show" role="alert" data-brk-library="component__alert">
                <button type="button" class="close font__size-18" data-dismiss="alert">
                    <span aria-hidden="true">
                        <i class="fa fa-times warning"></i>
                        </span>
                        <span class="sr-only">Close</span>
                    </button>
                    <i class="start-icon fa fa-exclamation-triangle faa-flash animated"></i>
                    <strong class="font__weight-semibold">Warning!</strong> Better check yourself, you're not looking too good.
                </div>
        </div>

        <div class="col-sm-12">
            <div class="alert fade alert-simple alert-danger alert-dismissible text-left font__family-montserrat font__size-16 font__weight-light brk-library-rendered rendered show" role="alert" data-brk-library="component__alert">
                <button type="button" class="close font__size-18" data-dismiss="alert">
                    <span aria-hidden="true">
                        <i class="fa fa-times danger "></i>
                        </span>
                        <span class="sr-only">Close</span>
                    </button>
                    <i class="start-icon far fa-times-circle faa-pulse animated"></i>
            <strong class="font__weight-semibold">Oh snap!</strong> Change a few things up and try submitting again.
            </div>
        </div>
        
        <div class="col-sm-12">
            <div class="alert fade alert-simple alert-primary alert-dismissible text-left font__family-montserrat font__size-16 font__weight-light brk-library-rendered rendered show" role="alert" data-brk-library="component__alert">
            <button type="button" class="close font__size-18" data-dismiss="alert">
                <span  aria-hidden="true"><i class="fa fa-times alertprimary"></i></span>
                    <span class="sr-only">Close</span>
                    </button>
                    <i class="start-icon fa fa-thumbs-up faa-bounce animated"></i>
                    <strong class="font__weight-semibold">Well done!</strong> You successfullyread this important.
                </div>
                
            </div>

        </div>
    </div>
    </section>
</body>
</html>