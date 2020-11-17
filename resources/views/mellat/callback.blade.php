<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Milad Shaker Dn |{{ isset($data['title']) ? $data['title']: "انتقال به پذیرنده" }}</title>
</head>

<body>


    <script type="text/javascript">
        var pay = {!! json_encode($pay) !!};
        var callBackUrl = "{{ $callBackUrl }}";
        function postRefId(pay) {
                                var form = document.createElement("form");
                                form.setAttribute("method", "POST");
                                form.setAttribute("action", callBackUrl);
                                for(name in pay){
                                    var hiddenField = document.createElement("input");
                                    hiddenField.setAttribute("type", "hidden");
                                    hiddenField.setAttribute("name",name);
                                    hiddenField.setAttribute("value", pay[name]);
                                    form.appendChild(hiddenField);
                                }
                                document.body.appendChild(form);
                                form.submit();
                                document.body.removeChild(form);
                            }
    </script>
    <script type="text/javascript">
        postRefId(pay);
    </script>
</body>

</html>