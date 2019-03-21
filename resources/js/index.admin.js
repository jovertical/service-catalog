import React from 'react';
import ReactDOM from 'react-dom';

const App = props => <h1>Hello from admin side!</h1>;

if (document.querySelector('#root')) {
    ReactDOM.render(<App />, document.querySelector('#root'));
}
