console.log('test', $("h1"));
$(document).ready(
    function() {

        $("h1").click(
            function () {
                $.ajax({
                    type:"POST",
                    url:"http://guestbook.loc/ajax/callBack",
                    data:{"name":"Hee"},
                    success:function (array) {
                        console.log(array);
                        $("#content").text(array);
                    },
                    error:function (err) {
                        console.log(err);
                    }

                })
            }
        )

    }
)

