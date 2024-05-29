<div class="btn-toolbar mb-3" role="toolbar">
    <div class="btn-group mr-2 mb-2 " role="group">
        <button type="button" class="btn btn-secondary" onclick="execCmd('fontName', 'Sans Serif')">Sans Serif</button>
        <button type="button" class="btn btn-secondary" onclick="execCmd('fontName', 'Arial')">Normal</button>
    </div>
    <div class="btn-group mr-2 mb-2 " role="group">
        <button type="button" class="btn btn-secondary" onclick="execCmd('bold')"><i class="fas fa-bold"></i></button>
        <button type="button" class="btn btn-secondary" onclick="execCmd('italic')"><i class="fas fa-italic"></i></button>
        <button type="button" class="btn btn-secondary" onclick="execCmd('underline')"><i class="fas fa-underline"></i></button>
        <button type="button" class="btn btn-secondary" onclick="execCmd('strikeThrough')"><i class="fas fa-strikethrough"></i></button>
    </div>
    <div class="btn-group mr-2 mb-2 " role="group">
        <button type="button" class="btn btn-secondary" onclick="execCmd('insertUnorderedList')"><i class="fas fa-list-ul"></i></button>
        <button type="button" class="btn btn-secondary" onclick="execCmd('insertOrderedList')"><i class="fas fa-list-ol"></i></button>
        <button type="button" class="btn btn-secondary" onclick="execCmd('outdent')"><i class="fas fa-outdent"></i></button>
        <button type="button" class="btn btn-secondary" onclick="execCmd('indent')"><i class="fas fa-indent"></i></button>
    </div>
    <div class="btn-group mr-2 mb-2 " role="group">
        <button type="button" class="btn btn-secondary" onclick="execCmd('justifyLeft')"><i class="fas fa-align-left"></i></button>
        <button type="button" class="btn btn-secondary" onclick="execCmd('justifyCenter')"><i class="fas fa-align-center"></i></button>
        <button type="button" class="btn btn-secondary" onclick="execCmd('justifyRight')"><i class="fas fa-align-right"></i></button>
        <button type="button" class="btn btn-secondary" onclick="execCmd('justifyFull')"><i class="fas fa-align-justify"></i></button>
    </div>
    <div class="btn-group mr-2 mb-2 " role="group">
        <button type="button" class="btn btn-secondary" onclick="execCmd('createLink', prompt('Enter a URL', 'http://'))"><i class="fas fa-link"></i></button>
    </div>
</div>