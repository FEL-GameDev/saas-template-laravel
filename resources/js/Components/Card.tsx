interface CardProps {
    children: any;
    className?: string;
    heading?: string;
    subheading?: string;
}

export default function Card({
    children,
    className,
    heading,
    subheading,
}: CardProps) {
    return (
        <div className="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <section className={"space-y-6 " + className}>
                {(heading || subheading) && (
                    <header>
                        {heading && (
                            <h2 className="text-lg font-medium text-gray-900">
                                {heading}
                            </h2>
                        )}

                        {subheading && (
                            <p className="mt-1 text-sm text-gray-600">
                                {subheading}
                            </p>
                        )}
                    </header>
                )}

                {children}
            </section>
        </div>
    );
}
