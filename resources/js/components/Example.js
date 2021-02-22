import React, {useRef} from 'react';
import ReactDOM from 'react-dom';
import { makeStyles } from '@material-ui/core/styles';
import EmailEditor from 'react-email-editor'
import {Button, Container, Grid} from "@material-ui/core";


const useStyles = makeStyles((theme) => ({
    root: {
        '& > *': {
            margin: theme.spacing(1),
        },
    },
    marginButton: {
        margin: '10px'
    }
}));

const Example = (props) => {
    const classes = useStyles();

    const emailEditorRef = useRef(null);

    const exportHtml = () => {
        emailEditorRef.current.editor.exportHtml((data) => {
            const { design, html } = data;
            console.log('exportHtml', html);
            alert('Design HTML has been saved in your developer console.');
        });
    };

    const saveDesign = () => {
        emailEditorRef.current.editor.saveDesign((design) => {
            // const options = {
            //     method: 'POST',
            //     headers: {'Content-Type': 'application/json'},
            //     body: {"displayMode":"web","design":{design},"mergeTags":{"name":"templates"}}
            // };
            //
            // fetch('https://api.unlayer.com/v2/export/html', options)
            //     .then(response => console.log(response))
            //     .catch(err => console.error(err));
            console.log('saveDesign', design);
            alert('Design JSON has been logged in your developer console.');
        });
    };

    const onLoad = () => {
        // you can load your template here;
        // const templateJson = {};
        // emailEditorRef.current.editor.loadDesign(templateJson);
    };



    return (
        <div className={classes.root}>
            <Grid item xs={12}>
                <Button className={classes.marginButton} variant="outlined" color="primary" onClick={exportHtml}>Export HTML</Button>
                <Button variant="outlined" color="primary" onClick={saveDesign}>Save Design as JSON</Button>
            </Grid>
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
