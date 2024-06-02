import PrimaryButtonLink from "../Buttons/PrimaryButtonLink";
import DangerButton from "../DangerButton";
import PrimaryButton from "../PrimaryButton";

interface SimpleRowProps {
    id: number;
    title: string;
    description?: string;
    editLink?: string;
    onClickDelete?: () => void;
}

export default function SimpleRow({
    id,
    title,
    description,
    editLink,
    onClickDelete,
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

                {onClickDelete && (
                    <DangerButton onClick={onClickDelete} title="Delete">
                        Delete
                    </DangerButton>
                )}
            </div>
        </div>
    );
}
