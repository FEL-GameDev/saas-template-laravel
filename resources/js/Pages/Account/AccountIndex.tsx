import Card from "@/Components/Card";
import PageContainer from "@/Components/PageContainer";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { PageProps } from "@/types";
import { Head } from "@inertiajs/react";
import DeleteUserForm from "./Partials/DeleteAccountForm";
import { Routes } from "@/types/routes";

export interface AccountProps extends PageProps {}

export default function Account({ auth }: AccountProps) {
    return (
        <AuthenticatedLayout
            user={auth.user}
            header={{ backButton: Routes.HOME, name: "Manage Account" }}
        >
            <Head title="Account" />

            <PageContainer>
                <Card
                    className="max-w-xl"
                    heading="Delete Account"
                    subheading="Once your account is deleted, all of its resources and data
                    will be permanently deleted. Before deleting your account,
                    please download any data or information that you wish to
                    retain."
                >
                    <DeleteUserForm />
                </Card>
            </PageContainer>
        </AuthenticatedLayout>
    );
}
