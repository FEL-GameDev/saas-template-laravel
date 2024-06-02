import {forwardRef, InputHTMLAttributes, useEffect, useImperativeHandle, useRef,} from "react";

export default forwardRef(function TextInput(
    {
        className = "",
        isFocused = false,
        ...props
    }: InputHTMLAttributes<HTMLTextAreaElement> & {
        isFocused?: boolean;
    },
    ref
) {
    const localRef = useRef<HTMLTextAreaElement>(null);

    useImperativeHandle(ref, () => ({
        focus: () => localRef.current?.focus(),
    }));

    useEffect(() => {
        if (isFocused) {
            localRef.current?.focus();
        }
    }, []);

    return (
        <textarea
            {...props}
            className={
                "border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm " +
                className
            }
            ref={localRef}
        />
    );
});
