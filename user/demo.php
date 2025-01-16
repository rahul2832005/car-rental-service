<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body{
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            font-family: "quicksand",sans-serif;
            background: #fff;
            color: #1c1c1c;
        }
        section{
           
            width: 80%;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        .title{
            
            font-size: 34px;

        }
        .faq{
            max-width: 700px;
            margin-top: 2rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid #fff;
            cursor: pointer;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .question{
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .question h3{
            margin-top: 10px;
            margin-left: 10px;
            font-size: 1.5rem;
        }

        .answer{
            color: #555;
            margin-top: 10px;
            margin-left: 10px;
            max-height: 0;
            overflow: hidden;
            transition: max-height 1.4s ease;

        }
        .answer p{
            padding-top: 1rem;
            line-height: 1.6;
            font-size: 1.2rem;

        }
         .faq.active .answer{
            max-height: 300px;
            animation: fade 1s ease-in-out;
        } 

        .faq.active svg{
            transform: rotate(180deg);
        }

        svg{
            margin-right: 15px;
            transition: transform .5s ease-in;
        }
        @keyframes fade {
            from{
                opacity: 0;
                transform: translateY(-10px);
            }
            to{
                opacity: 1;
                transform: translateY(0px);
            }
        }
    </style>
</head>
<body>
    <section>
        <h2 class="title">FAQs</h2>

        <div class="faq">
            <div class="question">
                <h3>Q. What is Javascript ?</h3>
                <svg width="15" height="10" viewBox="0 0 42 25">
                    <path d="M3 3L21 21L39 3" stroke="black" stroke-width="7" stroke-linecap="round"/>

                </svg>
            </div>
            <div class="answer">
                <p>
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. 
                    Facere esse repellendus voluptates neque voluptate sapiente 
                    odio a corporis error alias perferendis asperiores, 
                    tempora voluptatibus numquam atque commodi sed dolores natus!
                </p>
            </div>
        </div>

        <div class="faq">
            <div class="question">
                <h3>Q. What is Javascript ?</h3>
                <svg width="15" height="10" viewBox="0 0 42 25">
                    <path d="M3 3L21 21L39 3" stroke="black" stroke-width="7" stroke-linecap="round"/>

                </svg>
            </div>
            <div class="answer">
                <p>
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. 
                    Facere esse repellendus voluptates neque voluptate sapiente 
                    odio a corporis error alias perferendis asperiores, 
                    tempora voluptatibus numquam atque commodi sed dolores natus!
                </p>
            </div>
        </div>

        <div class="faq">
            <div class="question">
                <h3>Q. What is Javascript ?</h3>
                <svg width="15" height="10" viewBox="0 0 42 25">
                    <path d="M3 3L21 21L39 3" stroke="black" stroke-width="7" stroke-linecap="round"/>

                </svg>
            </div>
            <div class="answer">
                <p>
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. 
                    Facere esse repellendus voluptates neque voluptate sapiente 
                    odio a corporis error alias perferendis asperiores, 
                    tempora voluptatibus numquam atque commodi sed dolores natus!
                </p>
            </div>
        </div>
    </section>
</body>
<script>
    const faqs=document.querySelectorAll(".faq");

faqs.forEach(faq=>
    {
        faq.addEventListener("click",()=>{
            faq.classList.toggle("active");
        });
    });
</script>
</html>