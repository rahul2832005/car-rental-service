<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: system-ui, sans-serif;
  font-size: 16px;
  line-height: 1.8;
  color: #111;
  background-color: #fff;
}

header,
footer {
  padding-block: 2rem;
  color: #fff;
  background: linear-gradient(135deg, #0f4b60 0%, #06436d 100%);
}

main,
.page-width {
  max-width: 900px;
  padding-inline: 3rem;
  margin-inline: auto;
}

main {
  padding-block: 2rem;
  display: grid;
  grid-template-columns: 200px 1fr;
  align-items: start;
  gap: 2rem;

  /* overflow: visible; */
}

aside {
  position: sticky;
  top: 2rem;

  /* background-color: lightblue; */
}

.widget {
  min-height: 250px;
  border-radius: 8px;
}

.widget:not(:last-child) {
  margin-block-end: 1rem;
}

.widget.golden {
  background: repeating-linear-gradient(
    45deg,
    #f6ba52,
    #f6ba52 10px,
    #ffd180 10px,
    #ffd180 20px
  );
}

.widget.blue {
  background: repeating-linear-gradient(
    45deg,
    #8391ea,
    #8391ea 10px,
    #616ebc 10px,
    #616ebc 20px
  );
}

h1 {
  font-size: 2rem;
  font-weight: 600;
}

p {
  margin-block-end: 1em;
}

  </style>
</head>
<body>
<header>
  <div class="page-width">
    <h1>CSS Position Sticky</h1>
  </div>
</header>

<main>
  <aside>
    <div class="widget golden"></div>
    <div class="widget blue"></div>
  </aside>

  <article>
    <p>
      Lorem, ipsum dolor sit amet consectetur adipisicing elit. Possimus
      dolore commodi, necessitatibus quibusdam eius cupiditate ut tempora?
      Quam aperiam quasi quos corporis. Voluptate excepturi maiores dicta
      nobis, cumque soluta sapiente?
    </p>
    <p>
      Lorem, ipsum dolor sit amet consectetur adipisicing elit. Possimus
      dolore commodi, necessitatibus quibusdam eius cupiditate ut tempora?
      Quam aperiam quasi quos corporis. Voluptate excepturi maiores dicta
      nobis, cumque soluta sapiente? Lorem, ipsum dolor sit amet consectetur
      adipisicing elit. Possimus dolore commodi, necessitatibus quibusdam
      eius cupiditate ut tempora? Quam aperiam quasi quos corporis.
      Voluptate excepturi maiores dicta nobis, cumque soluta sapiente?
    </p>
    <p>
      Lorem, ipsum dolor sit amet consectetur adipisicing elit. Possimus
      dolore commodi, necessitatibus quibusdam eius cupiditate ut tempora?
      Quam aperiam quasi quos corporis. Voluptate excepturi maiores dicta
      nobis, cumque soluta sapiente? Lorem, ipsum dolor sit amet consectetur
      adipisicing elit. Possimus dolore commodi, necessitatibus quibusdam
      eius cupiditate ut tempora? Quam aperiam quasi quos corporis.
      Voluptate excepturi maiores dicta nobis, cumque soluta sapiente?
    </p>
    <p>
      Lorem, ipsum dolor sit amet consectetur adipisicing elit. Possimus
      dolore commodi, necessitatibus quibusdam eius cupiditate ut tempora?
      Quam aperiam quasi quos corporis. Voluptate excepturi maiores dicta
      nobis, cumque soluta sapiente? Lorem, ipsum dolor sit amet consectetur
      adipisicing elit. Possimus dolore commodi, necessitatibus quibusdam
      eius cupiditate ut tempora? Quam aperiam quasi quos corporis.
      Voluptate excepturi maiores dicta nobis, cumque soluta sapiente?
    </p>
    <p>
      Lorem, ipsum dolor sit amet consectetur adipisicing elit. Possimus
      dolore commodi, necessitatibus quibusdam eius cupiditate ut tempora?
      Quam aperiam quasi quos corporis. Voluptate excepturi maiores dicta
      nobis, cumque soluta sapiente? Lorem, ipsum dolor sit amet consectetur
      adipisicing elit. Possimus dolore commodi, necessitatibus quibusdam
      eius cupiditate ut tempora? Quam aperiam quasi quos corporis.
      Voluptate excepturi maiores dicta nobis, cumque soluta sapiente?
    </p>
    <p>
      Lorem, ipsum dolor sit amet consectetur adipisicing elit. Possimus
      dolore commodi, necessitatibus quibusdam eius cupiditate ut tempora?
      Quam aperiam quasi quos corporis. Voluptate excepturi maiores dicta
      nobis, cumque soluta sapiente? Lorem, ipsum dolor sit amet consectetur
      adipisicing elit. Possimus dolore commodi, necessitatibus quibusdam
      eius cupiditate ut tempora? Quam aperiam quasi quos corporis.
      Voluptate excepturi maiores dicta nobis, cumque soluta sapiente?
    </p>
    <p>
      Lorem, ipsum dolor sit amet consectetur adipisicing elit. Possimus
      dolore commodi, necessitatibus quibusdam eius cupiditate ut tempora?
      Quam aperiam quasi quos corporis. Voluptate excepturi maiores dicta
      nobis, cumque soluta sapiente? Lorem, ipsum dolor sit amet consectetur
      adipisicing elit. Possimus dolore commodi, necessitatibus quibusdam
      eius cupiditate ut tempora? Quam aperiam quasi quos corporis.
      Voluptate excepturi maiores dicta nobis, cumque soluta sapiente?
    </p>
    <p>
      Lorem, ipsum dolor sit amet consectetur adipisicing elit. Possimus
      dolore commodi, necessitatibus quibusdam eius cupiditate ut tempora?
      Quam aperiam quasi quos corporis. Voluptate excepturi maiores dicta
      nobis, cumque soluta sapiente?
    </p>
  </article>
</main>

<footer>
  <div class="page-width">
    This is footer.
  </div>
</footer>
</body>
</html>