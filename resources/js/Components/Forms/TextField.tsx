import InputError from "./InputError";
import InputLabel from "./InputLabel";
import TextInput from "./TextInput";

interface TextFieldProps {
    label: string;
    name: string;
    value: string;
    onChange: Function;
    errors?: string;
    fullWidth?: boolean;
}

export default function TextField({
    label,
    name,
    onChange,
    value,
    errors,
    fullWidth,
}: TextFieldProps) {
    return (
        <div>
            <InputLabel htmlFor={name}>{label}</InputLabel>

            <TextInput
                className={`${fullWidth && "w-full"}`}
                name={name}
                value={value}
                onChange={(e) => onChange(e)}
            />

            <InputError message={errors} className="truncate" />
        </div>
    );
}
