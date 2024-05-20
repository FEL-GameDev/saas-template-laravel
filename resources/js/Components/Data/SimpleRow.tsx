import { Link } from "@inertiajs/react";
import PrimaryButtonLink from "../Buttons/PrimaryButtonLink";

interface SimpleRowProps {
    id: number;
    title: string;
    description: string;
    editLink?: string;
}

export default function SimpleRow({
    id,
    title,
    description,
    editLink,
}: SimpleRowProps) {
    return (
        <div
            key={id}
            className="flex items-start justify-between grow px-2 py-4 hover:bg-slate-100"
        >
            <div>
                <p className="font-medium text-lg">{title}</p>
                <p>{description}</p>
            </div>

            <div>
                {editLink && <PrimaryButtonLink title="Edit" href={editLink} />}
            </div>
        </div>
    );
}
