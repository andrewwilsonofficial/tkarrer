<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Button inside input</title>
    <style>
        * {
            outline: none;
        }

        body {
            background-color: #607d8b;
        }

        .searchbox-wrap {
            display: flex;
            width: 500px;
            margin-top: 8%;
            margin-left: auto;
            margin-right: auto;


            input {
                flex: 1;
                padding: 30px 20px;
                font-size: 1.1em;

                -webkit-border-top-left-radius: 25px;
                -webkit-border-bottom-left-radius: 25px;
                -moz-border-radius-topleft: 25px;
                -moz-border-radius-bottomleft: 25px;
                border-top-left-radius: 25px;
                border-bottom-left-radius: 25px;
                box-shadow: none;
                border: none;
                box-shadow: 2px 4px 6px rgba(0, 0, 0, 0.19);

            }

            button {
                padding-right: 10px;

                background-color: #fff;
                -webkit-border-top-right-radius: 25px;
                -webkit-border-bottom-right-radius: 25px;
                -moz-border-radius-topright: 25px;
                -moz-border-radius-bottomright: 25px;
                border-top-right-radius: 25px;
                border-bottom-right-radius: 25px;
                box-shadow: 5px 4px 6px rgba(0, 0, 0, 0.19);
                border: none;
                cursor: pointer;
                cursor: hand;

                span {
                    margin-left: 50px;
                    padding: 24px 45px;

                    font-size: 0.9em;
                    text-transform: uppercase;
                    font-weight: 300;
                    color: #fff;
                    background-color: #F54E59;

                    border-radius: 20px;
                    box-shadow: 2px 4px 6px rgba(0, 0, 0, 0.19);

                    &:hover {
                        background-color: #d6121f;
                        box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.19);
                    }

                }
            }
        }
    </style>
</head>

<body>
    <div class="searchbox-wrap">
        <input type="text" placeholder="Search for something...">
        <button><span>Send</span> </button>
    </div>
</body>

</html>
