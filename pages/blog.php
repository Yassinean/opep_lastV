<?php
   require "../includes/dbh.inc.php";
   session_start();
//    if($_SESSION['statut'] != 'client'){
//         header("Location: ../pages/index.php");
//    }

    $sql="SELECT * from theme";
    $req = mysqli_query($conn,$sql);
    
    


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <script src="https://cdn.tailwindcss.com"></script>
    <title>Blog</title>
</head>
<body>
    <header class='h-screen ' >
      
        
         <div class="flex ">
            <div class="h-screen w-3/5 bg-stone-100">
        <nav class=' flex justify-between items-center p-5 w-full m-auto'>
            <img class="w-20" src="../images/logo.webp" alt="">
            <ul class='flex justify-center items-center'>
                <a href="#" class='mx-2 ease-in duration-300 hover:bg-stone-100 hover:text-black bg-gray-700 text-white rounded-md px-3 py-2 text-sm font-medium'>Accueil</a>
                <a href="#" class='ease-in duration-300 class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium'>Store</a>
            </ul>
            <h1 class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bonjour Oussama znagui</h1>
            
        </nav>
        <div class=' my-5  h-3/4 w-3/4 m-auto'>
            <h1 class="mb-4 text-2xl font-extrabold text-gray-900 dark:text-white md:text-4xl lg:text-5xl">
                <span class="text-3xl md:text-5xl lg:text-6xl text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">Jardin Numérique</span><br>
                Faites Pousser votre Communauté Verte
            </h1>
            <p class="my-5 ">Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus voluptatum debitis facilis minima, doloremque tempora reiciendis quibusdam quaerat dolorem excepturi deleniti ex itaque aliquid nobis a. Officiis iusto consequatur accusamus!</p>
            <button type="button" class="text-gray-900 bg-gradient-to-r from-teal-200 to-lime-200 hover:bg-gradient-to-l hover:from-teal-200 hover:to-lime-200 focus:ring-4 focus:outline-none focus:ring-lime-200 dark:focus:ring-teal-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Teal to Lime</button>
            <div class="flex items-center my-5 ">
             <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-5 w-5 mx-1"
                fill="currentColor"
                style="color: #333"
                viewBox="0 0 24 24">
                <path
                    d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z" />
                </svg>
                <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-5 w-5 mx-1"
                fill="currentColor"
                style="color: #1877f2"
                viewBox="0 0 24 24">
                <path
                    d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z" />
                </svg>
                <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-5 w-5 mx-1"
                fill="currentColor"
                style="color: #c13584"
                viewBox="0 0 24 24">
                <path
                    d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                </svg>
                <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-5 w-5 mx-1"
                fill="currentColor"
                style="color: #0077b5"
                viewBox="0 0 24 24">
                <path
                    d="M4.98 3.5c0 1.381-1.11 2.5-2.48 2.5s-2.48-1.119-2.48-2.5c0-1.38 1.11-2.5 2.48-2.5s2.48 1.12 2.48 2.5zm.02 4.5h-5v16h5v-16zm7.982 0h-4.968v16h4.969v-8.399c0-4.67 6.029-5.052 6.029 0v8.399h4.988v-10.131c0-7.88-8.922-7.593-11.018-3.714v-2.155z" />
                </svg>
                <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-5 w-5 mx-1"
                fill="currentColor"
                style="color: #e60023"
                viewBox="0 0 24 24">
                <path
                    d="M12 0c-6.627 0-12 5.372-12 12 0 5.084 3.163 9.426 7.627 11.174-.105-.949-.2-2.405.042-3.441.218-.937 1.407-5.965 1.407-5.965s-.359-.719-.359-1.782c0-1.668.967-2.914 2.171-2.914 1.023 0 1.518.769 1.518 1.69 0 1.029-.655 2.568-.994 3.995-.283 1.194.599 2.169 1.777 2.169 2.133 0 3.772-2.249 3.772-5.495 0-2.873-2.064-4.882-5.012-4.882-3.414 0-5.418 2.561-5.418 5.207 0 1.031.397 2.138.893 2.738.098.119.112.224.083.345l-.333 1.36c-.053.22-.174.267-.402.161-1.499-.698-2.436-2.889-2.436-4.649 0-3.785 2.75-7.262 7.929-7.262 4.163 0 7.398 2.967 7.398 6.931 0 4.136-2.607 7.464-6.227 7.464-1.216 0-2.359-.631-2.75-1.378l-.748 2.853c-.271 1.043-1.002 2.35-1.492 3.146 1.124.347 2.317.535 3.554.535 6.627 0 12-5.373 12-12 0-6.628-5.373-12-12-12z"
                    fill-rule="evenodd"
                    clip-rule="evenodd" />
                </svg>
            </div>







        </div>

         </div>
         <div class="h-screen w-2/5 bg-[url('../images/blog.webp')] bg-cover bg-center	 ">
            
         </div>
         </div>



    </header>
    <main>
        <section class="bg-stone-100 py-20">
            

        <div class="flex flex-col justify-center  items-center">
                <h1 class="mb-4 text-2xl font-extrabold leading-none tracking-tight text-gray-900 md:text-4xl lg:text-4xl dark:text-white">Consulter votre theme prefere</h1>
    <p class="w-3/4 m-auto text-center mb-6 text-lg font-normal text-gray-500 lg:text-lg sm:px-16 xl:px-48">Here at Flowbite we focus on markets where technology, innovation, and capital can unlock long-term value and drive economic growth.</p>
    
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 w-4/5 m-auto my-5">
        
           
       <?php
       while($row=mysqli_fetch_row($req)){
        ?>
       <a href="article.php?id=<?php echo $row[0] ?>">
         <div class = "rounded-lg h-60		 bg-gray-300 max-w-full  bg-[url('../uploads/<?= $row['2']?>')] ">
            <div class="rounded-lg bg-black opacity-80	 w-full h-full flex justify-center  items-center">
                <div class='rounded-lg border-neutral-50 border-solid border-2 w-3/4 h-2/4 hover:border-none flex justify-center  items-center font-black text-xl hover:text-3xl ease-in duration-300	'>
                    <h1 class="text-white">
                        <?php echo $row[1] ?>
                    </h1>

                </div>
            </div>
        </div>
       </a>

        <?php
       }
       ?>

       
        
      
        
        
        

    </div>
    
  
   
</div>
        </section>
    </main>

    
</body>
</html>