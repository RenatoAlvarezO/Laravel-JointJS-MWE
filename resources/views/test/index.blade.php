<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jointjs/3.7.2/joint.css" />
</head>

<body>
    <button id="btn-add-rectangle">Add Rectangle</button>
    <input id="input-rectangle-name" type="text" />
    <label id="input-mode-label" for="input-mode">Move</label>
    <input id="input-mode" type="checkbox"  name="input-mode"/>
    <div id="whiteboard"></div>
    @include('test.script')
</body>

</html>
