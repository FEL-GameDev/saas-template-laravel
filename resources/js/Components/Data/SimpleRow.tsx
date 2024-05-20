import { Link } from "@inertiajs/react";
import PrimaryButtonLink from "../Buttons/PrimaryButtonLink";

interface SimpleRowProps {
    id: number;
    title: string;
    description?: string;
    editLink?: string;
    deleteLink?: string;
}

export default function SimpleRow({
    id,
    title,
    description,
    editLink,
    deleteLink,
}: SimpleRowProps) {
    return (
        <div
            key={id}
            className="flex items-start justify-between grow px-2 py-4 hover:bg-slate-100"
        >
            <div>
                <p className="font-medium text-lg">{title}</p>

                {description && <p>{description}</p>}
            </div>

            <div className="flex gap-2">
                {editLink && (
                    <PrimaryButtonLink
                        title="Edit"
                        href={route(editLink, id)}
                    />
                )}

                {deleteLink && (
                    <PrimaryButtonLink
                        title="Delete"
                        method="delete"
                        href={route(deleteLink, id)}
                    />
                )}
            </div>
        </div>
    );
}
