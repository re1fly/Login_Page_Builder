import React, {useEffect, useRef, useState} from 'react';
import ReactDOM from 'react-dom';
import {makeStyles} from '@material-ui/core/styles';
import EmailEditor from 'react-email-editor'
import {Button, Container, Grid} from "@material-ui/core";
import axios from 'axios';


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

    const [dataJson, setDataJson] = useState();
    const [dataHtml, setDataHtml] = useState(dataHtml);

    const exportHtml = () => {
        emailEditorRef.current.editor.exportHtml((data) => {
            // const { design, html } = data;

            const dataHtml = {
                template: data.html
            };

            axios.post('http://htmleditor.com/html', dataHtml).then(response => {
                console.log(response);
                setDataHtml(response.data.results);
            }).catch((err) => {
                console.error(err)
            })
            // console.log('exportHtml', html);
            // alert('Design HTML has been saved in your developer console.');
        });
    };

    const saveDesign = () => {
        emailEditorRef.current.editor.saveDesign((design) => {
            const dataJson = {
                template: JSON.stringify({design})
            };

            axios.post('http://htmleditor.com/json', dataJson).then(response => {
                emailEditorRef.current.editor.loadDesign(design)

            }).catch((err) => {
                console.error(err)
            })

            // // console.log('saveDesign', design);
            // // alert('Design JSON has been logged in your developer console.');
        });

    };

    const onLoad = async () => {

        axios.get('http://htmleditor.com/json').then(response => {
            emailEditorRef.current.editor.loadDesign(response.data.results)
        })

    };

    const template = () => {
        console.log(dataJson)
        emailEditorRef.current.editor.loadDesign(dataJson)
    };


    return (
        <div className={classes.root}>
            <Grid item xs={12}>
                <Button className={classes.marginButton} variant="outlined" color="primary" onClick={exportHtml}>Export
                    HTML</Button>
                <Button className={classes.marginButton} variant="outlined" color="primary" onClick={saveDesign}>Save
                    Design as JSON</Button>
                <Button className={classes.marginButton} variant="outlined" color="primary" onClick={template}>this
                    template</Button>
            </Grid>
            <React.StrictMode>
                <EmailEditor ref={emailEditorRef} onLoad={onLoad}/>
            </React.StrictMode>
        </div>
    );
};

export default Example;

if (document.getElementById('example')) {
    ReactDOM.render(<Example />, document.getElementById('example'));
}
