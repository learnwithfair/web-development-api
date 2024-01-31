<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>JWT Token</title>
    <!-- Bootstrap Start  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <!-- Bootstrap End  -->
    <!-- For Icon Start -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous">
    </script>
    <!-- For Icon End -->
</head>
<?php
###########################################################################
// CALLING FUNCTION AFTER CLICK SUBMIT BUTTON
###########################################################################

// Generate Token
if ( isset( $_POST['generate-token-btn'] ) ) {
    $tokenResult = generateToken( $_POST['text-id'] );

}
// Verify Token
if ( isset( $_POST['verify-token-btn'] ) ) {
    $verifyResult = Verify( $_POST['token-id'] );
}

?>

<body>
    <div class="container">
        <!-- Input Section  -->
        <div class="row">
            <!-- Token Input Section Start  -->
            <div class="col-md-6 mt-5">
                <div class="card p-3">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <h3 class="text-center">JWT Token Generate</h3>
                        <hr />
                        <br />
                        <div></div>
                        <div class="form-outline ">
                            <div class="row form-group mb-4">
                                <div class="col-sm-3">
                                    <label for="text-id" class="form-label">Text</label>
                                </div>
                                <div class="col-sm-9">
                                    <textarea class="form-control" rows="5" id="text-id" name="text-id"
                                        placeholder="Write your text here.." required></textarea>
                                </div>
                            </div>


                            <br />
                            <div class="text-center">
                                <button type="reset" class="btn btn-dark  btn-sm" style="margin: 0px 10px">
                                    Reset
                                </button>
                                <button type="submit" class="btn btn-warning btn-sm" name="generate-token-btn"
                                    style="margin: 0px 10px">
                                    Generate
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
            <!-- Token Input Section End  -->
            <!-- Token Verify Section Start  -->
            <div class="col-md-6 mt-5">
                <div class="card p-3">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <h3 class="text-center">JWT Token Verify</h3>
                        <hr />
                        <br />
                        <div></div>
                        <div class="form-outline ">
                            <div class="row form-group mb-4">
                                <div class="col-sm-3">
                                    <label for="token-id" class="form-label">Token</label>
                                </div>
                                <div class="col-sm-9">
                                    <textarea class="form-control" rows="5" id="token-id" name="token-id"
                                        placeholder="Watting For Token.."><?php isset( $tokenResult ) ? printf( $tokenResult ) : printf( "" );?></textarea>
                                </div>
                            </div>


                            <br />
                            <div class="text-center">
                                <button type="reset" class="btn btn-dark  btn-sm" style="margin: 0px 10px">
                                    Reset
                                </button>
                                <button type="submit" class="btn btn-warning btn-sm" name="verify-token-btn"
                                    style="margin: 0px 10px">
                                    Verify
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
            <!-- Token Input Section End  -->
        </div>
        <h1 class="text-center text-info mt-5">Result</h1>
        <!-- Result Section  -->
        <div class="row">
            <!-- Token Result Section Start  -->
            <?php if ( isset( $tokenResult ) ) {?>
            <div class="col-md-12 mt-5">
                <div class="card p-3">
                    <div class="row">
                        <div class="col-sm-3">
                            <label for="">Token</label>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-justify"><?php echo $tokenResult; ?> </p>
                        </div>


                    </div>
                </div>
            </div>
            <?php }?>
            <!-- Token Result Section End  -->
            <!-- Token result Verify Section Start  -->

            <?php if ( isset( $verifyResult ) ) {?>
            <div class="col-md-12 mt-5">
                <div class="card p-3">
                    <div class="row">
                        <div class="col-sm-3">
                            <label for="">Original Text</label>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-justify"><?php echo $verifyResult; ?> </p>
                        </div>


                    </div>
                </div>
            </div>
            <?php }?>

            <!-- Token Result Section End  -->
        </div>




    </div>






    <!-- Bootstrap Start  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <!-- For Popper  -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
    <!-- Bootstrap End  -->
</body>

</html>

<?php

###########################################################################################
//                                      TOKEN FUNCTION
###########################################################################################

function generateToken( $payload ) {
    $key = "JSONWEBTOKEN";
    $payload_encoded = base64_encode( json_encode( $payload ) );
    return $payload_encoded;
}

function Verify( $token ) {
    $key = "JSONWEBTOKEN";
    $payload = json_decode( base64_decode( $token ), true );
    return $payload;
}

###########################################################################################
//                                      /TOKEN FUNCTION
###########################################################################################
?>