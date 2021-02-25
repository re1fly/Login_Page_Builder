import React from 'react';
import { Route, Switch } from 'react-router-dom'
import Design from './Design'
import FormPage from './FormPage'

class Routes extends React.Component {
    render() {
        return (
            <Switch>
                <Route  path='/editor/form' component={FormPage} />
                <Route exact path='/editor/design' component={Design} />
            </Switch>
        )
    }
}

export default Routes;
