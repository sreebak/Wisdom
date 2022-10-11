<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .section_01_mailin {
            margin-top: 10%;
        }

        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            max-width: 60%;
            padding: 15px;
            background-color: white;
            margin: auto;
            max-width: 250px;
            font-family: arial;
            padding: 1rem;
            border-width: 3px;
            border-style: solid;
            border-image: linear-gradient(to bottom, #008aff, rgba(0, 0, 0, 0)) 1 100%;
        }

        .card {
            max-width: 70%;
            background-color: white;
        }

        .card_he {
            max-width: 63%;
            margin: auto;
            font-family: arial;
        }

        .card_in {
            max-width: 60%;
            margin: auto;
            font-family: arial;
            padding: 15px;
        }

        .title {
            color: grey;
            font-size: 18px;
            line-height: 30px;
        }

        .h1_t {
            font-size: 18px;
            font-weight: 800;
            text-transform: uppercase;
            color: #6b6b6f;
        }

        button {
            border: none;
            outline: 0;
            display: inline-block;
            padding: 8px;
            color: white;
            background-color: #000;
            text-align: center;
            cursor: pointer;
            width: 100%;
            font-size: 18px;
        }

        .t_r {
            text-align: right;
        }

        .pt_thanks {
            padding-top: 10%;
        }

        a {
            text-decoration: none;
            font-size: 22px;
            color: black;
        }

        button:hover,
        a:hover {
            opacity: 0.7;
        }

        .h_main h2 {
            text-align: left;
            padding-left: 15px;
            color: #6b6b6f;
        }



        .bg_img_ {
            background: rgb(2, 0, 36);
            background: linear-gradient(90deg, rgba(2, 0, 36, 0.25253851540616246) 0%, rgba(9, 103, 121, 0.16010154061624648) 50%, rgba(2, 147, 176, 0.22172619047619047) 100%);
        }

        @media (max-width:575px) {
            .card {
                max-width: 90%;
            }

            .title {
                color: grey;
                text-align: justify;
                font-size: 14px;
                line-height: 41px;
                padding: 15px;
            }

            .pt_thanks {
                padding-top: 10%;
                font-size: 12px;
            }
        }

        @media (min-width:576px) and (max-width:767px) {
            .card {
                max-width: 90%;
            }

            .title {
                color: grey;
                text-align: justify;
                font-size: 14px;
                line-height: 41px;
                padding: 15px;
            }

            .pt_thanks {
                padding-top: 10%;
                font-size: 12px;
            }

            .section_01_mailin {
                margin-top: 7% !important;
            }
        }

        @media (min-width:768px) and (max-width:991px) {
            .card {
                max-width: 90%;
            }

            .title {
                color: grey;
                text-align: justify;
                font-size: 14px;
                line-height: 41px;
                padding: 15px;
            }

            .pt_thanks {
                color: #56565a;
                padding-top: 10%;
                font-size: 12px;
            }
        }

        @media (min-width:992px) and (max-width:1199px) {
            .card {
                max-width: 80%;
                background-color: white;
            }
        }

        .title {
            color: grey;
            text-align: justify;
            font-size: 15px;
            line-height: 27px;
            padding: 15px;
        }

        .pt_thanks {
            padding-top: 10%;
            font-size: 14px;
            color: #4b4b69;
        }

        @media (min-width:1200px) {}

    </style>
</head>
<body class="bg_img_">
    <section class="section_01_mailin">
        <div>
            <div class="card">
                <span class="h1_t"> <span> {{$details['title']}}</span></span>
                {!! $details['body'] !!}
                <div class="thanks t_r pt_thanks">
                    <span> Thanks </span>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
