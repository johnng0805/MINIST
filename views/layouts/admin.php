<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/styles/admin/main.css">
    <link rel="stylesheet" href="./assets/styles/admin/store.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <title>MINIST | Admin</title>
</head>

<body>
    <div class="wrapper">
        <div class="sidebar">
            <h2>Minist</h2>
            <div class="dash"></div>
            <h4>Admin</h4>
            <div class="seperator"></div>
            <ul>
                <li><a href="index.html"><i class=" fas fa-chalkboard"></i>Dashboard</a></li>
                <li><a href="store.html"><i class="fas fa-store"></i>Store</a></li>
                <li><a href="#"><i class="fas fa-user-tie"></i>User</a></li>
            </ul>
            <button type="button" name="logoutBtn"><i class="fas fa-sign-out-alt"></i>Logout</button>
        </div>
        {{content}}
    </div>
    <script>
        $(function() {
            $(".sidebar ul li").on("click", function() {
                $(".sidebar ul li").removeClass("active");
                $(this).addClass("active");
            });
        });
    </script>
</body>

</html>