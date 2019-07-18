import React, { Component } from "react";
import {
  BrowserRouter as Router,
  Route,
  Link,
  Redirect,
  withRouter
} from "react-router-dom";
import Login from "./Login"
import PrivateRoute from "./PrivateRoute"
import NewExample from "./NewExample"
import Examples from "./Examples"

import "./examples.css";

class App extends Component {
	constructor(props){
		super(props);
		this.state = {
			lastId: 0
		};
	}

	setLastId = (lastId) => {
		this.setState({ lastId: lastId });
	}

	render(){
		return (
			<Router>
				<div className="App">
					<header>
						<Login />
						<ul>
							<li>
								<Link to="/">Examples</Link>
							</li>
							<li>
								<Link to="/admin">Admin</Link>
							</li>
				        </ul>
					</header>
					<Route path="/login" component={Login} />
					<Route exact path="/" component={props => <Examples {...props} lastId={this.setLastId} />} />					
					<PrivateRoute path="/admin" component={props => <NewExample {...props} nId={this.state.lastId} />} />
				</div>
			</Router>
		);
	}
}

export default App;