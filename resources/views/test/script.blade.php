<!-- dependencies -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.21/lodash.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/backbone.js/1.4.1/backbone.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jointjs/3.7.2/joint.js"></script>

<script type="text/javascript">
    var namespace = joint.shapes;
    let currentElement = null;

    var graph = new joint.dia.Graph({}, {
        cellNamespace: namespace
    });

    var paper = new joint.dia.Paper({
        el: document.getElementById('whiteboard'),
        model: graph,
        width: 600,
        height: 600,
        gridSize: 1,
        cellViewNamespace: namespace
    });

    paper.on("element:pointerclick", handleOnElementClick);
    paper.on("cell:pointermove", handleOnCellClick);
    $('#btn-add-rectangle').on('click', addRectangle);
    $('#input-mode').on('click', updateMode);

    function handleOnCellClick(view, evt, x, y) {
        currentElement = view
    }

    function handleOnElementClick(view, evt, x, y) {
        let state = $('#input-mode').prop("checked");
        if (!state) {
            currentElement = view
        }
        if (state) {
            let link = new joint.shapes.standard.Link();
            let target = view.model;
            link.source(currentElement.model);
            link.target(target);
            link.addTo(graph);
        }

    }

    function updateMode() {

        let state = $('#input-mode').prop("checked");
        console.log(state)
        if (state)
            $('#input-mode-label').text("Link");
        else
            $('#input-mode-label').text("Move");
    }

    function addRectangle() {
        var rect = new joint.shapes.standard.Rectangle();
        let name = $('#input-rectangle-name').val();
        rect.position(100, 30);
        rect.resize(100, 40);
        rect.attr({
            body: {
                fill: 'blue'
            },
            label: {
                text: name,
                fill: 'white'
            }
        });
        rect.addTo(graph);
        currentElement = rect;
    }

</script>
