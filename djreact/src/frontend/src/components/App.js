import React, { Component } from "react";
import { render } from "react-dom";
import Home from "./Home";
// import  SelectGame from "./SelectGame";
export default class App extends Component {
  constructor(props) {
    super(props);
    this.state ={

    }
  }

  render() {
    return (
      <div>
         <Home />
        
      </div>
        // <h1>{this.props.greeting}</h1> 
        // {} is for us to write js in html 
       
    );
  }
}

const appDiv = document.getElementById("app");
render(<App/>, appDiv);