import React from "react";

export default function Welcome({ user = { name: "pepe" } }) {
    return (
        <>
            <h1>Welcome</h1>
            <p>Hello {user.name}, welcome to your first Inertia app!</p>
        </>
    );
}
