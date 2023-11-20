interface PageHeadingProps {
    label: string;
}

export default function PageHeading({ label }: PageHeadingProps) {
    return (
        <h2 className="font-semibold text-xl text-gray-800 leading-tight">
            {label}
        </h2>
    );
}
