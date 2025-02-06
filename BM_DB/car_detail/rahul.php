<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Synchronized Scrolling Divs</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            overflow: hidden;
        }

        .container {
            display: flex;
            height: 100vh;
        }

        .scroll-div {
            width: 50%;
            height: 100vh;
            overflow-y: scroll;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        .content {
            height: 200vh; /* Content enough to scroll */
            padding: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div id="div1" class="scroll-div">
            <div class="content">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Laborum atque ipsum explicabo aspernatur omnis expedita recusandae nulla dolores voluptas libero, ipsa illum quaerat officiis harum totam praesentium dignissimos est optio doloremque. Optio laudantium totam ullam? Pariatur modi perferendis accusamus quod ut consequuntur minus voluptate consequatur repellendus? Aspernatur maiores tenetur unde laborum labore esse deleniti nihil ratione mollitia atque exercitationem repellendus quae, temporibus voluptatem deserunt cum officiis officia cupiditate! Odit repellendus magnam nobis quis voluptas repudiandae labore magni quas ullam, minima consectetur id minus dolorem totam quos molestias corporis! Neque, magni. Quae atque veniam, fuga quos incidunt iure totam sint ullam eius commodi tempore. Natus tempore cum reiciendis labore ratione vero odit assumenda, culpa inventore praesentium asperiores officia et omnis quo consequatur exercitationem commodi, repellat eos veniam nisi minus provident quae aut aspernatur! Ex reprehenderit harum sint autem. Enim optio quis, tempore cumque veritatis repellat, deleniti tempora suscipit ipsa, laboriosam atque quisquam iure corrupti. Enim quibusdam esse hic optio obcaecati et maxime, fugit laboriosam sunt, molestiae vel deserunt suscipit doloremque officiis dolores minima? Incidunt ipsum illo quae itaque velit perspiciatis animi ratione, dolore sed a molestiae consectetur at aliquam id quod minima, eos fugiat autem, aspernatur eum corrupti? Dicta, sequi quasi? Recusandae nobis a illo maiores esse. Soluta incidunt neque porro, dolorem atque quaerat ab tempore eaque laudantium error? Aut asperiores tempora eligendi iste laboriosam vitae quod, sapiente commodi harum omnis voluptates! Rem quas odit, libero incidunt corrupti expedita neque nobis! Vel laboriosam laborum inventore veritatis molestiae numquam in molestias, vero explicabo accusamus adipisci quos nesciunt delectus dolorum unde! Nisi maiores, nesciunt voluptate eos nobis dolor cum, in veniam impedit doloremque corporis incidunt, ullam error fugiat. Modi necessitatibus fugit perferendis esse, commodi nemo corporis hic qui ducimus vero ab libero. Reiciendis magnam eius nihil a fuga alias, ratione cum quod recusandae provident facere dolorem temporibus aut nulla blanditiis in repudiandae doloribus rerum modi. Ut vitae vero consequatur id! Dicta non vel explicabo delectus esse veniam, voluptatibus, culpa aperiam ea suscipit sit voluptatem autem facere nulla aut consequatur laborum quas debitis! Ea dicta hic, repudiandae dolor nobis amet eaque vitae explicabo minima ipsam placeat voluptates quas sunt omnis maxime cumque totam consequatur quam expedita rem possimus dolorum! Soluta magnam similique labore sint eum nemo corrupti debitis maxime libero? Veritatis, itaque quis, doloribus laudantium exercitationem accusantium officiis libero et necessitatibus accusamus cum sunt nobis nisi commodi, quam repudiandae eveniet ea distinctio harum ipsam minima est aliquam quidem mollitia? Nobis, quod? Hic eum, dicta, pariatur aspernatur ipsa illum voluptatibus, laborum minima rem quod cupiditate vitae amet sit ducimus est voluptatum numquam officia neque ipsum vel libero. Tempora mollitia ducimus ipsam rerum dolorum ipsum, facilis a culpa quisquam reprehenderit velit id esse soluta iste consequuntur! Modi, natus veniam corrupti molestias illum perferendis minima consequatur rem distinctio sit iusto eveniet quam accusantium commodi, hic omnis sint! Doloremque voluptatem itaque, quisquam rem cumque accusamus? Excepturi explicabo harum reprehenderit eaque provident magnam itaque eius fugiat tenetur ea numquam at odio inventore, facere nihil sunt ipsa quod eligendi repellat sit, quos optio quibusdam? Nihil aliquam, ipsum id dolores dolor omnis debitis numquam, commodi hic similique doloremque minus beatae ea nobis quia incidunt. Assumenda quo dignissimos in modi, rem praesentium! Laudantium, amet suscipit cumque quasi perferendis, voluptatibus commodi fuga veritatis similique nam harum earum sed voluptas ipsa nobis facilis reprehenderit corporis officia! Est, natus! Ipsa pariatur a, magnam recusandae eveniet quisquam placeat dignissimos tenetur laboriosam alias iste corporis earum libero enim dicta perferendis odio voluptates molestias quo voluptas quam vel. Unde ipsa modi fugiat, eos dolor, facilis inventore sapiente aliquam nemo ducimus obcaecati suscipit aspernatur, similique blanditiis. Atque sunt dolores quidem recusandae alias sapiente ex non itaque? Tempora quam recusandae reprehenderit repudiandae a rem minus animi possimus nemo, eum totam! Aspernatur, vel! Animi minima voluptas alias neque rerum architecto, molestiae adipisci, assumenda maxime provident eum? Ea, voluptatum veniam atque omnis maiores laborum numquam quos non quam aperiam nam vero ipsa ad pariatur perferendis iusto ut labore! Soluta nostrum veniam, fuga ratione qui ullam asperiores quo. Unde ipsa fugit est possimus impedit, doloribus eius eos voluptates, quaerat voluptatem ab deserunt libero quibusdam sint. Aliquid unde itaque ab, autem suscipit quasi amet laboriosam minima. Natus porro in eius suscipit facilis repudiandae eligendi debitis harum quae laboriosam dolorem nemo repellendus, nostrum aliquid voluptatibus sapiente dolore provident animi doloremque! Totam quaerat vitae eos, quam ab iste! Quaerat illo quas ipsum possimus! Quam dolore iure facilis voluptatibus maiores quis reiciendis doloribus distinctio ratione eveniet vel, rerum, vitae similique veniam amet quas repellendus perferendis saepe itaque harum magnam! Tempore in eaque, quibusdam iure voluptatibus minima harum, sed beatae expedita nihil nesciunt nam, eligendi eveniet! Necessitatibus doloribus numquam vitae accusamus quidem obcaecati amet consectetur voluptates ex? Id facere distinctio maxime ratione, earum ex aliquid vero veritatis delectus perspiciatis. Reprehenderit, molestias fuga hic ratione ullam veniam odio fugiat rem accusantium mollitia quam cupiditate dolores, aperiam quasi inventore quod officia assumenda ea quaerat nesciunt optio eaque. Delectus veritatis consequatur, officia voluptatum dolore nemo iusto illo mollitia non maiores eveniet, vitae quia aut accusantium itaque labore perferendis! Ea soluta nesciunt provident quo asperiores quas a. Rerum commodi cumque obcaecati consequuntur quaerat architecto suscipit aperiam consectetur exercitationem dignissimos pariatur et voluptas voluptatibus est esse fuga facilis placeat veritatis ducimus, ex reprehenderit corrupti, numquam sint. Placeat soluta nam quisquam est et? Ab sed nostrum non ullam quia facere beatae quaerat suscipit at consequuntur, voluptatum repellat numquam quidem minima aspernatur, excepturi qui. Facere, ipsam ipsa! Quasi vero sapiente debitis neque rem aut dolorum expedita, possimus perferendis molestiae, non molestias natus numquam, explicabo eos quae consectetur? Minima repudiandae maiores optio tempora accusantium aperiam error nisi fugiat, quam, incidunt voluptates numquam! Qui molestias dolorum cupiditate, neque nulla sit minima? Delectus praesentium inventore nobis reiciendis dolores error repellat at, vitae minima aliquid nesciunt ipsum odio. Fuga unde nisi sapiente veritatis dolore placeat est dolorem voluptatem ducimus voluptate! Mollitia perspiciatis dolore commodi tempora earum nostrum animi, at quae, vitae laudantium ex. Earum saepe id consequatur alias sequi nesciunt culpa eveniet cumque ipsum exercitationem. Molestias fugiat consequuntur quas!Div 1 Content<br>Keep scrolling...<br>More content here...</div>
        </div>
        <div id="div2" class="scroll-div">
            <div class="content">Div 2 Content<br>Keep scrolling...<br>Even more content here...</div>
        </div>
    </div>

    <script>
        const div1 = document.getElementById('div1');
        const div2 = document.getElementById('div2');

        let isSyncingDiv1 = false;
        let isSyncingDiv2 = false;

        div1.addEventListener('scroll', () => {
            if (!isSyncingDiv2) {
                isSyncingDiv1 = true;
                div2.scrollTop = div1.scrollTop;
            }
            isSyncingDiv2 = false;
        });

        div2.addEventListener('scroll', () => {
            if (!isSyncingDiv1) {
                isSyncingDiv2 = true;
                div1.scrollTop = div2.scrollTop;
            }
            isSyncingDiv1 = false;
        });
    </script>
</body>
</html>