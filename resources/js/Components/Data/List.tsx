interface ListProps {
    children: React.ReactNode;
}

export default function List({ children }: ListProps) {
    return <div className="flex-col flex-auto divide-y">{children}</div>;
}
