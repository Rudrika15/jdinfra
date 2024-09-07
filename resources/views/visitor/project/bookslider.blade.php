<div class="book">
    <div id="pages" class="pages">
      <div class="page" style="background-image: url('https://papermine.com/pub/autoship-wellness-june20202/media/32191221.png')"></div>
      <div class="page" style="background-image: url('https://papermine.com/pub/autoship-wellness-june20202/media/32191283.png')"></div>
      <div class="page" style="background-image: url('https://papermine.com/pub/autoship-wellness-june20202/media/32191250.png')"></div>
      <div class="page" style="background-image: url('https://papermine.com/pub/autoship-wellness-june20202/media/32191400.png')"></div>
      <div class="page" style="background-image: url('https://papermine.com/pub/autoship-wellness-june20202/media/32191336.png')"></div>
      <div class="page" style="background-image: url('https://papermine.com/pub/autoship-wellness-june20202/media/32191370.png')"></div>
    </div>
  </div>
  <style>
    .book {
  transition: opacity 0.4s 0.2s;
}
p{
  margin-top: 8vw;
  text-align: center;
  font-size: 5vw;
  color: #000000;
}
.page {
  width: 40vw;
  height: 55vw;
  float: left;
  margin-bottom: 0.5em;
  background: top no-repeat;
  background-size: cover;
}
.page:nth-child(even) {
  clear: both;
}
.book {
  perspective: 250vw;
}
.book .pages {
  width: 80vw;
  height: 55vw;
  position: relative;
  transform-style: preserve-3d;
  backface-visibility: hidden;
  border-radius: 4px;
}
.book .page {
  float: none;
  clear: none;
  margin: 0;
  position: absolute;
  top: 0;
  width: 40vw;
  height: 55vw;
  transform-origin: 0 0;
  transition: transform 1.4s;
  backface-visibility: hidden;
  transform-style: preserve-3d;
  cursor: pointer;
  user-select: none;
  background-color: #f0f0f0;
}
.book .page:before {
  content: '';
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  transition: background 0.7s;
  z-index: 2;
}
.book .page:nth-child(odd) {
  pointer-events: all;
  transform: rotateY(0deg);
  right: 0;
  border-radius: 0 4px 4px 0;
}
.book .page:nth-child(odd):hover {
  transform: rotateY(-15deg);
}
.book .page:nth-child(odd):hover:before {
  background: rgba(0, 0, 0, 0.03);
}
.book .page:nth-child(odd):before {
  background: rgba(0, 0, 0, 0);
}
.book .page:nth-child(even) {
  pointer-events: none;
  transform: rotateY(180deg);
  transform-origin: 100% 0;
  left: 0;
  border-radius: 4px 0 0 4px;
  border-color: black;
}
.book .page:nth-child(even):before {
  background: rgba(0, 0, 0, 0.2);
}
.book .page.grabbing {
  transition: none;
}
.book .page.flipped:nth-child(odd) {
  pointer-events: none;
  transform: rotateY(-180deg);
}
.book .page.flipped:nth-child(odd):before {
  background: rgba(0, 0, 0, 0.2);
}
.book .page.flipped:nth-child(even) {
  pointer-events: all;
  transform: rotateY(0deg);
}
.book .page.flipped:nth-child(even):hover {
  transform: rotateY(15deg);
}
.book .page.flipped:nth-child(even):hover:before {
  background: rgba(0, 0, 0, 0.03);
}
.book .page.flipped:nth-child(even):before {
  background: rgba(0, 0, 0, 0);
}
*,
* :before,
*:after {
  box-sizing: border-box;
}
  </style>
  <script>
    var pages = document.getElementsByClassName('page');
  for(var i = 0; i < pages.length; i++)
    {
      var page = pages[i];
      if (i % 2 === 0)
        {
          page.style.zIndex = (pages.length - i);
        }
    }

  document.addEventListener('DOMContentLoaded', function(){
    for(var i = 0; i < pages.length; i++)
      {
        //Or var page = pages[i];
        pages[i].pageNum = i + 1;
        pages[i].onclick=function()
          {
            if (this.pageNum % 2 === 0)
              {
                this.classList.remove('flipped');
                this.previousElementSibling.classList.remove('flipped');
              }
            else
              {
                this.classList.add('flipped');
                this.nextElementSibling.classList.add('flipped');
              }
           }
        }
  })
  </script>