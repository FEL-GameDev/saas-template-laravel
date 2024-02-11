import React from "react";
import InputLabel from "./InputLabel";

interface InputSelectProps {
    options: { id: number; name: string }[];
    selected: number;
    name: string;
    label: string;
    onChange: (e: React.ChangeEvent<HTMLSelectElement>) => void;
}

export default function InputSelect({
    options,
    selected,
    name,
    label,
    onChange,
}: InputSelectProps) {
    return (
        <div>
            <InputLabel htmlFor={name} value={label} />

            <select
                onChange={onChange}
                name={name}
                className="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
            >
                {options.map((option) => (
                    <option value={option.id} selected={selected === option.id}>
                        {option.name}
                    </option>
                ))}
            </select>
        </div>
    );
}
