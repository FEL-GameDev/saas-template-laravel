import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import {Head, Link} from "@inertiajs/react";
import {PageProps} from "@/types";
import Card from "@/Components/Card";
import PageContainer from "@/Components/PageContainer";
import {Role} from "@/types/roles";
import {Routes} from "@/types/routes";

export interface RolesIndexProps extends PageProps {
    roles: Role[];
}

export default function RolesIndex({auth, roles}: RolesIndexProps) {
    return (
        <AuthenticatedLayout
            user={auth.user}
            header={{
                name: "Roles",
                backButton: Routes.ROLES,
            }}
        >
            <Head title="Roles"/>

            <PageContainer>
                <div className="mx-auto text-right">
                    <Link
                        href={route("roles.create")}
                        as="button"
                        className="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                    >
                        New Role
                    </Link>
                </div>

                <Card
                    heading="Roles"
                    subheading="You can use roles to create sets of permissions for your users"
                >
                    {roles.map((role) => (
                        <div key={role.id}>
                            <h5>
                                <strong>{role.name}</strong> (
                                {role.users_count ? role.users_count : 0})
                                <Link
                                    as="button"
                                    href={route("roles.destroy", role.id)}
                                    method="delete"
                                >
                                    [Delete]
                                </Link>
                            </h5>
                            <p>{role.description} </p>
                        </div>
                    ))}
                </Card>
            </PageContainer>
        </AuthenticatedLayout>
    );
}
