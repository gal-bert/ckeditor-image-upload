<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>CKEditor 5 - Classic editor</title>
    <script src="https://cdn.ckeditor.com/ckeditor5/35.4.0/classic/ckeditor.js"></script>
</head>
<body>
    <h1>Classic editor</h1>

    <form action="/store" method="POST">
        @csrf
            <textarea name="content" id="editor" cols="30" rows="10">

            </textarea>

        <br>
        <button type="submit">Submit</button>
    </form>


    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ), {
                plugins: [ Image, ImageResizeEditing, ImageResizeHandles],
                ckfinder: {
                    uploadUrl: '{{route('ckeditor.upload').'?_token='.csrf_token()}}',
                    openerMethod: 'popup'
                }
            })
            .then( editor => {
                console.log( editor )
            })
            .catch( error => {
                console.error( error );
            } );
    </script>
</body>
</html>

