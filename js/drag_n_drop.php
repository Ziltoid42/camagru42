<style>
    .draggableBox {
    position: absolute;
    width: 80px; height: 60px;
    padding-top: 10px;
    text-align: center;
    font-size: 40px;
    background-color: #222;
    color: #CCC;
    cursor: move;
}
</style>

<div class="draggableBox">1</div>
<div class="draggableBox">2</div>
<div class="draggableBox">3</div>

<script>

(function() {

    var storage = {};

    function init(){
        var elements = document.querySelectorAll('.draggableBox'),
        elementsLength = elements.length;

        for (var i = 0; i < elementsLength; i++){
            elements[i].addEventListener('mousedown', function(e){ //drag and drop on
                
                var s = storage;
                s.target = e.target;
                s.offsetX = e.clientX - s.target.offsetLeft;
                s.offsetY = e.clientY - s.target.offsetTop; 
            });

            elements[i].addEventListener('mouseup', function(){ //drag and drop off

                storage = {}; //reset object
            });

        }

        document.addEventListener('mousemove', function(e){

            var target = storage.target;

            if(target){
                target.style.left = e.clientX - storage.offsetX + 'px';
                target.style.top = e.clientY - storage.offsetY + 'px';
            }
        });
    }
    init();
})();

</script>