import Card from "@/Components/Card";
import InputLabel from "@/Components/Forms/InputLabel";
import InputSelect from "@/Components/Forms/InputSelect";
import TextField from "@/Components/Forms/TextField";
import PageContainer from "@/Components/PageContainer";
import PrimaryButton from "@/Components/PrimaryButton";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { PageProps, User } from "@/types";
import { Role } from "@/types/roles";
import { Routes } from "@/types/routes";
import { Head, useForm } from "@inertiajs/react";
import React, { BaseSyntheticEvent } from "react";

interface UserEditProps extends PageProps {
    user: User;
    roles: Role[];
}

export default function UserEdit({ roles, auth, user }: UserEditProps) {
    const { role, name, email } = user;

    const { patch, reset, data, setData, errors, processing } = useForm({
        name: name,
        email: email,
        role_id: role?.id,
    });

    const submit = (e: BaseSyntheticEvent) => {
        e.preventDefault();
        patch(route("users.update", user.id), {onSuccess: () => reset() });
    };

    return (
        <AuthenticatedLayout
            user={auth.user}
            header={{ name: "Manage Users", backButton: Routes.USERS }}
        >
            <Head title="Edit User" />

            <PageContainer>
                <Card
                    heading="Edit user"
                    subheading="Users are able to update their passwords on their personal profile page"
                >
                    <form onSubmit={submit}>
                        <div className="mt-6 space-y-6 flex flex-col justify-center w-4/12">
                            <TextField
                                fullWidth
                                name="name"
                                value={data.name}
                                errors={errors.name}
                                label="Name"
                                onChange={(e: any) =>
                                    setData("name", e.target.value)
                                }
                            />

                            <TextField
                                fullWidth
                                name="email"
                                value={data.email}
                                errors={errors.email}
                                label="Email"
                                onChange={(e: any) =>
                                    setData("email", e.target.value)
                                }
                            />

                            <InputSelect
                                label="Role"
                                name="role"
                                options={roles}
                                onChange={(e: any) =>
                                    setData("role_id", e.target.value)
                                }
                                selected={user.role?.id || roles[0].id}
                            />
                        </div>

                        <PrimaryButton className="mt-4" disabled={processing}>
                            Save
                        </PrimaryButton>
                    </form>
                </Card>
            </PageContainer>
        </AuthenticatedLayout>
    );
}
