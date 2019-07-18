import React from "react";
import {  BrowserRouter as Router,  Route,  Redirect } from "react-router-dom";
import { useAuth0 } from "./react-auth0-wrapper";

const PrivateRoute = ({component: Component, ...rest}) => {
	const { isAuthenticated, loginWithRedirect } = useAuth0();

	return (
		<Route
			{...rest}
			render={props => 
				isAuthenticated ? (
					<Component {...props} />
				) : (
					<Redirect
						to={{
							pathname: "/login",
							state: { from: props.location }
						}}
					/>
				)
			}
		/>
	)
}

export default PrivateRoute;