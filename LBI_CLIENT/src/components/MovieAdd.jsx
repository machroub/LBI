import React from "react";
import { useForm } from "react-hook-form";
export default function MovieAdd() {
    const {handleSubmit, register, formState:{errors}} = useForm()
    return (
        <>
            <div>MovieAdd</div>
            <form action=""></form>
        </>
    );
}
