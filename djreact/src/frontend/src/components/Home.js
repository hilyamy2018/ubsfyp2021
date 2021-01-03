import React, { Component } from "react";
import  SelectGame from "./SelectGame";
import {
    BrowserRouter as Router,
    Switch,
    Route,
    Link,
    Redirect,
  } from "react-router-dom";

export default class Home extends Component {
    constructor(props) {
      super(props);
    }


   render() {
    return (
      <Router>
        <Switch>
          <Route exact path="/"> 
            <p>This is the home page</p>
          </Route>
          <Route path="/selectgame" component={SelectGame} />
        </Switch>
      </Router>
    );
  }
}