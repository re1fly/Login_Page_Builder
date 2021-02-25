import React from 'react';
import { Formik, Form, Field, FieldArray, ErrorMessage } from 'formik';
import * as Yup from 'yup';

export default function FormPage() {
    const initialValues = {
        numberOfForms: '',
        forms: []
    };

    const validationSchema = Yup.object().shape({
        numberOfForms: Yup.string()
            .required('Number of forms is required'),
        forms: Yup.array().of(
            Yup.object().shape({
                name: Yup.string()
                    .required('Name is required'),
                email: Yup.string()
                    .email('Email is invalid')
                    .required('Email is required'),
                country: Yup.string()
                    .required('Country is required'),
            })
        )
    });

    function onChangeForms(e, field, values, setValues) {
        // update dynamic form
        const forms = [...values.forms];
        const numberOfForms = e.target.value || 0;
        const previousNumber = parseInt(field.value || '0');
        if (previousNumber < numberOfForms) {
            for (let i = previousNumber; i < numberOfForms; i++) {
                forms.push({ name: '', email: '', country: '' });
            }
        } else {
            for (let i = previousNumber; i >= numberOfForms; i--) {
                forms.splice(i, 1);
            }
        }
        setValues({ ...values, forms });

        // call formik onChange method
        field.onChange(e);
    }

    function onSubmit(fields) {
        // display form field values on success
        alert('SUCCESS! \n\n' + JSON.stringify(fields, null, 4));
    }

    return (
        <Formik initialValues={initialValues} validationSchema={validationSchema} onSubmit={onSubmit}>
            {({ errors, values, touched, setValues }) => (
                <Form>
                    <div className="card m-3">
                        <h5 className="card-header text-center">This Form for User Login</h5>
                        <div className="card-body border-bottom">
                            <div className="form-row">
                                <div className="form-group">
                                    <label>Number of Forms</label>
                                    <Field name="numberOfForms">
                                        {({ field }) => (
                                            <select {...field} className={'form-control' + (errors.numberOfForms && touched.numberOfForms ? ' is-invalid' : '')} onChange={e => onChangeForms(e, field, values, setValues)}>
                                                <option value=""></option>
                                                {[1,2,3,4].map(i =>
                                                    <option key={i} value={i}>{i}</option>
                                                )}
                                            </select>
                                        )}
                                    </Field>
                                    <ErrorMessage name="numberOfForms" component="div" className="invalid-feedback" />
                                </div>
                            </div>
                        </div>
                        <FieldArray name="forms">
                            {() => (values.forms.map((ticket, i) => {
                                const formErrors = errors.forms?.length && errors.forms[i] || {};
                                const formTouched = touched.forms?.length && touched.forms[i] || {};
                                return (
                                    <div key={i} className="list-group list-group-flush">
                                        <div className="list-group-item">
                                            <h5 className="card-title">Form {i + 1}</h5>
                                            <div className="form-row">
                                                <div className="form-group col-3">
                                                    <label>Name</label>
                                                    <Field name={`forms.${i}.name`} type="text" className={'form-control' + (formErrors.name && formTouched.name ? ' is-invalid' : '' )} />
                                                    <ErrorMessage name={`forms.${i}.name`} component="div" className="invalid-feedback" />
                                                </div>
                                                <div className="form-group col-3">
                                                    <label>Email</label>
                                                    <Field name={`forms.${i}.email`} type="text" className={'form-control' + (formErrors.email && formTouched.email ? ' is-invalid' : '' )} />
                                                    <ErrorMessage name={`forms.${i}.email`} component="div" className="invalid-feedback" />
                                                </div>
                                                <div className="form-group col-3">
                                                    <label>Country</label>
                                                    <Field name={`forms.${i}.country`} type="select" as="select" className={'form-control' + (formErrors.country && formTouched.country ? ' is-invalid' : '' )}  >
                                                        <option value="Indonesia">Indonesia</option>
                                                        <option value="United States">United States</option>
                                                        <option value="Japan">Japan</option>
                                                        <option value="France">France</option>
                                                        <option value="Russia">Russia</option>
                                                    </Field>
                                                    <ErrorMessage name={`forms.${i}.country`} component="div" className="invalid-feedback" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                );
                            }))}
                        </FieldArray>
                        <div className="card-footer text-center border-top-0">
                            <button type="submit" className="btn btn-primary mr-1">
                                Submit Forms
                            </button>
                            <button className="btn btn-secondary mr-1" type="reset">Reset</button>
                        </div>
                    </div>
                </Form>
            )}
        </Formik>
    )
}
