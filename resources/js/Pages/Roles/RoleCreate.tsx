import Card from "@/Components/Card";
import {TextField} from "@/Components/Forms/TextField";
import PageContainer from "@/Components/PageContainer";
import PrimaryButton from "@/Components/PrimaryButton";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import {PageProps} from "@/types";
import {Routes} from "@/types/routes";
import {Head, useForm} from "@inertiajs/react";
import React, {BaseSyntheticEvent} from "react";

interface RoleCreateProps extends PageProps {}

export default function RoleCreate({ auth }: RoleCreateProps) {
    const { post, reset, data, setData, errors, processing } = useForm({
        name: "",
        description: "",
        role_code: "",
    });

    const submit = (e: BaseSyntheticEvent) => {
        e.preventDefault();
        post(route("roles.store"), { onSuccess: () => reset() });
    };

    return (
        <AuthenticatedLayout
            user={auth.user}
            header={{
                name: "Create Role",
                backButton: Routes.ROLES,
            }}
        >
            <Head title="Create Role" />

            <PageContainer>
                <Card heading="Create new Role">
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
                                name="description"
                                value={data.description}
                                errors={errors.description}
                                label="Description"
                                onChange={(e: any) =>
                                    setData("description", e.target.value)
                                }
                            />

                            <TextField
                                fullWidth
                                name="role_code"
                                value={data.role_code}
                                errors={errors.role_code}
                                label="Role Code"
                                onChange={(e: any) =>
                                    setData("role_code", e.target.value)
                                }
                            />
                        </div>

                        <PrimaryButton className="mt-4" disabled={processing}>
                            Add Role
                        </PrimaryButton>
                    </form>
                </Card>
            </PageContainer>
        </AuthenticatedLayout>
    );
}
