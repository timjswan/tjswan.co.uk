import React from "react";
import { useAuth0 } from "./react-auth0-wrapper";

const Login = (props) => {
	const { isAuthenticated, loginWithRedirect, logout } = useAuth0();

	return(
		<div>
			{!isAuthenticated && (
				<button onClick={() => loginWithRedirect({})}>Login</button>
			)}

			{isAuthenticated && (
				<button onClick={() => logout({})}>Log out</button>
			)}
		</div>
	);
}

export default Login;