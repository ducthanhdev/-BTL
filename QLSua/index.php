<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop điện tử</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body class="bg-gray-100">
    <header class="bg-blue-600 text-white p-4">
        <div class="container mx-auto flex justify-between items-center">
            <div class="text-lg font-bold">
                <a href="index.php">Shop Sữa </a>
            </div>

            <div class="flex">

                <div class="flex space-x-4">
                    <input type="text" class="p-2 rounded-lg" placeholder="Tìm kiếm sản phẩm...">
                    <button class="bg-blue-800 p-2 rounded-lg btnAuth">
                        <a  class="textAuth"></a>
                    </button>
                </div>
    
                <div class="auth">
    
                </div>
            </div>
        </div>
    </header>
    <main class="container mx-auto p-4">

        <section class="mb-8">
            <h2 class="text-2xl font-semibold mb-4">Danh mục sản phẩm</h2>
            <div class="grid grid-cols-4 gap-4">
                <div class="bg-white p-4 rounded-lg shadow-md hover:shadow-lg text-center">
                    <img src="https://cdn.thuvienphapluat.vn/uploads/tintuc/2023/07/24/sua-dung-thay-sua-me.jpg"
                        alt="Category" class="w-full h-32 object-cover mb-4 rounded-lg">
                    <h3 class="font-semibold">Sữa Bò</h3>
                </div>
                <div class="bg-white p-4 rounded-lg shadow-md hover:shadow-lg text-center">
                    <img src="https://cdn.nhathuoclongchau.com.vn/unsafe/800x0/filters:quality(95)/https://cms-prod.s3-sgn09.fptcloud.com/khi_nao_nen_cho_be_uong_sua_1_4401cf044a.jpg"
                        alt="Category" class="w-full h-32 object-cover mb-4 rounded-lg">
                    <h3 class="font-semibold">Sữa Mẹ</h3>
                </div>
                <div class="bg-white p-4 rounded-lg shadow-md hover:shadow-lg text-center">
                    <img src="https://media-cdn-v2.laodong.vn/Storage/NewsPortal/2021/1/11/870023/Untitled-1.jpg"
                        alt="Category" class="w-full h-32 object-cover mb-4 rounded-lg">
                    <h3 class="font-semibold">Sữa Đau Đầu</h3>
                </div>
                <div class="bg-white p-4 rounded-lg shadow-md hover:shadow-lg text-center">
                    <img src="https://media-cdn-v2.laodong.vn/Storage/NewsPortal/2022/5/31/1051007/Sua-Lua-1.jpg"
                        alt="Category" class="w-full h-32 object-cover mb-4 rounded-lg">
                    <h3 class="font-semibold">Sữa Đá</h3>
                </div>
            </div>
        </section>
        <section>
            <h2 class="text-2xl font-semibold mb-4">Sản phẩm nổi bật</h2>
            <div class="grid grid-cols-3 gap-4">
                <?php
                include './connect.php';
                $query = "select * from Sua";
                $result = mysqli_query($conn, $query);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                ?>
                        <div class="bg-white p-4 rounded-lg shadow-md hover:shadow-lg">
                            <img src="<?php echo $row["thumbnail"] ?>" alt="Product"
                                class="w-full h-48 object-cover mb-4 rounded-lg">
                            <h3 class="font-semibold line-clamp-1"><?php echo $row["title"] ?></h3>
                            <div class="flex justify-between items-center">
                                <p class="text-gray-600"><?php echo $row["price"] ?></p>
                                <p class="text-gray-600"><?php echo $row["weight"] ?></p>
                            </div>
                            <a href="detail.php?sp=<?php echo $row["id"] ?>"
                                class="bg-blue-600 text-white p-2 rounded-lg mt-4 w-full block text-center">Xem Chi Tiết</a>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
        </section>
    </main>
    <footer class="bg-blue-600 text-white p-4 mt-8">
        <div class="container mx-auto text-center">
            <p> 2024 Shop Sữa All rights reserved.</p>
        </div>
    </footer>

    <script>
    const isLogin = localStorage.getItem("isLogin");
    const textAuth = document.querySelector(".textAuth"); 
    const btnAuth = document.querySelector(".btnAuth");
    const authDiv = document.querySelector(".auth");  
 

    if (textAuth) {  
        if (isLogin === '1') {
            textAuth.textContent = "Đăng xuất"; 
            textAuth.href = window.location.href+"admin/index.php"; 
        } else {
            textAuth.textContent = "Đăng nhập";  
            textAuth.href = window.location.href+"admin/index.php"; 
        }
    }

    if (isLogin === '1' && authDiv) { 
        const link = document.createElement("a");
        link.href = "http://localhost/-BTL/QLSua/admin/index.php";  
        link.classList.add("btn-link");  

        const newButton = document.createElement("button");
        newButton.textContent = "Admin Control";  
        newButton.classList.add("bg-blue-500", "text-white", "px-4", "py-2", "rounded", "hover:bg-blue-700", "focus:outline-none", "focus:ring", "focus:ring-blue-300"); 
        newButton.classList.add("btnAdmin");  

        link.appendChild(newButton);

        authDiv.appendChild(link);
    }


    if(btnAuth){
        btnAuth.addEventListener("click",()=>{
            if (isLogin === '1') {
                localStorage.setItem("isLogin", "0");
            }
        })
    }
</script>
</body>



</html>