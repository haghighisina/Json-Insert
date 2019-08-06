<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script
        src="http://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js">
    </script>
    <script>
        $(document).ready(function () {
            $.get("http://localhost/JSON/Json1/service.php", function (data, status) {
               console.log(data);
               var toDo = JSON.parse(data);
               for (var i = 0; i < toDo.length;i++){
                    var item = "id: " + toDo[i].id +" name: "+ toDo[i].name +
                    " pass: "+ toDo[i].pss +" email: "+ toDo[i].email;
                   item = "<dive>" + item + "</dive>"+"<br>";
                   $("#myitem").append(item);
               }
            });
            $("#save").click(function () {
                var name = $("#name").val();
                var email = $("#email").val();
                var pss = $("#pss").val();
                var item = {
                    itemName: name,
                    itemEmail: email,
                    itemPss: pss
                };
                $.post("http://localhost/JSON/Json1/service.php", item, function(data) {
                    $("#q").text(data);

                });
            });
        });
    </script>
</head>
<body style="text-align: center;">
<div>
    <h3> to do list</h3>
    <ol id="myitem">

    </ol>
</div> 
    <form>
        <h3>add</h3>
        <input type="text" name="desc" id="name"><br>
        <input type="text" name="duedata" id="email"><br>
        <input type="text" name="priority" id="pss"><br>
        <button type="button" id="save" value="save Item"> save </button>
        <p id="q"></p>
    </form>
</body>
</html>