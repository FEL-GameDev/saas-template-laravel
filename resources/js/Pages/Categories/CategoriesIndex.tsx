import PrimaryButtonLink from "@/Components/Buttons/PrimaryButtonLink";
import Card from "@/Components/Card";
import List from "@/Components/Data/List";
import SimpleRow from "@/Components/Data/SimpleRow";
import PageContainer from "@/Components/PageContainer";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { PageProps } from "@/types";
import { Category } from "@/types/categories/category";

export interface CategoriesIndexProps extends PageProps {
    categories: Category[];
}

export default function CategoriesIndex({
    auth,
    categories,
}: CategoriesIndexProps) {
    debugger;

    return (
        <AuthenticatedLayout
            user={auth.user}
            header={{ name: "Manage Categories" }}
        >
            <PageContainer>
                <div className="mx-auto text-right">
                    <PrimaryButtonLink
                        href={route("categories.create")}
                        title={"New Category"}
                    />
                </div>

                <Card heading="Your Categories">
                    <List>
                        {categories.map((category) => (
                            <SimpleRow
                                id={category.id}
                                title={category.name}
                                key={category.id}
                                description={category.description}
                                editLink="/categories/1/edit"
                            />
                        ))}
                    </List>
                </Card>
            </PageContainer>
        </AuthenticatedLayout>
    );
}
