import React, {useRef} from 'react';
import ReactDOM from 'react-dom';

import EmailEditor from 'react-email-editor'

const Example = (props) => {
    const emailEditorRef = useRef(null);

    const exportHtml = () => {
        emailEditorRef.current.editor.exportHtml((data) => {
            const { design, html } = data;
            console.log('exportHtml', html);
        });
    };

    const onLoad = () => {
        // you can load your template here;
        // const templateJson = {};
        // emailEditorRef.current.editor.loadDesign(templateJson);
    };

    return (
        <div>
            <div>
                <button onClick={exportHtml}>Export HTML</button>
            </div>

            <EmailEditor
                ref={emailEditorRef}
                onLoad={onLoad}
            />
        </div>
    );
};

export default Example;

if (document.getElementById('example')) {
    ReactDOM.render(<Example />, document.getElementById('example'));
}
