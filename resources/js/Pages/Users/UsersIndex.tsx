import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head, Link } from "@inertiajs/react";
import { PageProps, User } from "@/types";
import PageContainer from "@/Components/PageContainer";
import Card from "@/Components/Card";
import { UserInvite } from "@/types/UserInvites";
import { Routes } from "@/types/routes";

export interface UsersIndexProps extends PageProps {
    users: User[];
    invited_users: UserInvite[];
    can_invite: boolean;
    can_manage_roles: boolean;
}

export default function UsersIndex({
    auth,
    users,
    can_invite,
    can_manage_roles,
    invited_users,
}: UsersIndexProps) {
    return (
        <AuthenticatedLayout
            user={auth.user}
            header={{ name: "Manage Users", backButton: Routes.HOME }}
        >
            <Head title="Users" />

            <PageContainer>
                <div className="mx-auto text-right">
                    {can_invite && (
                        <Link
                            href={route("user_invites.create")}
                            as="button"
                            className="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                        >
                            Invite User
                        </Link>
                    )}
                </div>

                {can_manage_roles && (
                    <div className="mx-auto text-right">
                        <Link
                            href={route("roles.index")}
                            as="button"
                            className="text-white bg-blue-200 hover:bg-blue-400 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                        >
                            Manage Roles
                        </Link>
                    </div>
                )}

                <Card heading="Users" className="max-w-xl">
                    <ul className="list-none">
                        {users.map((user) => (
                            <Link
                                href={user.edit_url ? user.edit_url : ""}
                                key={user.id}
                            >
                                <li>
                                    <p>
                                        {user.name} - {user.email}{" "}
                                        <strong>{user.role?.name}</strong>
                                    </p>
                                </li>
                            </Link>
                        ))}
                    </ul>
                </Card>

                <Card
                    className="max-w-xl"
                    heading="Invited Users"
                    subheading="These users have received an email to join your organization."
                >
                    {invited_users.length > 0 && (
                        <ul>
                            {invited_users.map((invited_user: any) => (
                                <li key={invited_user.id}>
                                    {invited_user.name} - {invited_user.email} -{" "}
                                    {invited_user.invite_code}{" "}
                                    <Link
                                        as="button"
                                        href={route(
                                            "user_invites.destroy",
                                            invited_user.id
                                        )}
                                        method="delete"
                                    >
                                        Delete
                                    </Link>
                                </li>
                            ))}
                        </ul>
                    )}
                </Card>
            </PageContainer>
        </AuthenticatedLayout>
    );
}
